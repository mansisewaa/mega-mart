<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function wishlist()
    {
        // dd(Auth::guard('customer')->check());
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user()->id;
            $wishlists = Wishlist::where('customer_id', $customer)->get();
            return view('customer.wishlist', compact('wishlists'));
        } else {
            return redirect()
                ->route('customer.login')
                ->with('error', 'Please login as a customer to view the Wishlist.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function addToWishlist($productId)
    {
        $customer = Auth::guard('customer')->user();

        $wishlist = Wishlist::where('customer_id', $customer->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        }

        Wishlist::create([
            'customer_id' => $customer->id,
            'product_id'  => $productId,
        ]);

        return response()->json(['status' => 'added']);
    }

    public function removeToWishlist($productId)
    {
        $customer = Auth::guard('customer')->user();

        $wishlist = Wishlist::where('customer_id', $customer->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist.');
        } else {
            return redirect()->back()->with('error', 'Product not found in wishlist.');
        }
    }

    public function cartView()
    {
        if (! Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        } else {
            $customer_id = Auth::guard('customer')->user()->id;
            $cartItems   = Cart::where('customer_id', $customer_id)->with('product')->get();

            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            return view('cart', compact('cartItems', 'subtotal'));
        }
    }

    public function cartAdd(Request $request, $id)
    {
        if (! Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        }

        $customer_id = Auth::guard('customer')->user()->id;

        $product = Products::find($id);
        if (! $product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $quantity = $request->input('quantity', 1);
        $cartItem = Cart::where('customer_id', $customer_id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->total_price = $cartItem->quantity * $product->product_discount_price;
            $cartItem->save();
        } else {
            Cart::create([
                'customer_id' => $customer_id,
                'product_id'  => $id,
                'quantity'    => $quantity,
                'price'       => $product->product_discount_price,
                'total_price' => $quantity * $product->product_discount_price,
            ]);
        }

        return redirect()->route('customer.cart')->with('success', 'Product added to cart!');
    }


    public function cartRemove($id)
    {
        $item = Cart::find($id);
        if ($item) {
            $item->delete();
        }

        $subtotal = Cart::where('customer_id', auth()->guard('customer')->user()->id)->sum('total_price');

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'formattedSubtotal' => formatRupees($subtotal), // use your helper for formatting
        ]);
    }


    public function checkoutPage()
    {
        if (! Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        } else {
            $customer_id = Auth::guard('customer')->user()->id;
            $cartItems   = Cart::where('customer_id', $customer_id)->with('product')->get();

            $orderNo = "ORD" . now()->format('Ymd') . rand(1000, 9999);

            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            return view('checkout', compact('cartItems', 'subtotal', 'orderNo'));
        }
    }

    public function checkout(Request $request)
    {
        $customerId = Auth::guard('customer')->user()->id;

        $cartItems = Cart::where('customer_id', $customerId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')->with('error', 'Your cart is empty');
        }

        $customer = Auth::guard('customer')->user();

        $shippingAddress = $customer->address . ', ' .
            $customer->city . ', ' .
            $customer->state . ' - ' .
            $customer->pin_code;

        $order = Order::create([
            'orderNo' => $request->orderNo ?? 'ORD-' . time(),
            'customer_id' => $customerId,
            'total_price' => $cartItems->sum('total_price'),
            'status' => 'pending',
            'payment_method' => $request->payment_method, // default, can be updated
            'shipping_address' => $shippingAddress ?? null,
        ]);


        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $item->total_price,
            ]);
        }

        Cart::where('customer_id', $customerId)->delete();

        return redirect()->route('customer.orders.show')->with('success', "Your order #{$order->orderNo} has been placed successfully!");
    }


    public function orderShow()
    {
        if (! Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        } else {
            $customer_id = Auth::guard('customer')->user()->id;
            $orders      = Order::where('customer_id', $customer_id)->with('items.product')->get();

            return view('orders', compact('orders'));
        }
    }

    public function orderDetails($id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        }

        $customer_id = Auth::guard('customer')->user()->id;

        $order = Order::where('customer_id', $customer_id)
            ->with('items.product')
            ->findOrFail($id);

        return view('orders.details', compact('order'));
    }


    public function getCounts()
    {
        $wishlistCount = 0;
        $cartCount = 0;

        if (Auth::guard('customer')->check()) {
            $customerId = Auth::guard('customer')->id();
            $wishlistCount = Wishlist::where('customer_id', $customerId)->count();
            $cartCount = Cart::where('customer_id', $customerId)->count();
        }

        return response()->json([
            'wishlistCount' => $wishlistCount,
            'cartCount' => $cartCount,
        ]);
    }

}
