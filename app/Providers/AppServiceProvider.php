<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require_once app_path('Helper/helpers.php');
        view()->composer('*', function ($view) {
            $menus = Menu::where('status', 1)->get();

            $wishlistCount = 0;
            $cartCount = 0;

            if (Auth::guard('customer')->check()) {
                $customerId = Auth::guard('customer')->id();
                $wishlistCount = Wishlist::where('customer_id', $customerId)->count();
                $cartCount = Cart::where('customer_id', $customerId)->count();
            }

            $view->with([
                'menus' => $menus,
                'wishlistCount' => $wishlistCount,
                'cartCount' => $cartCount,
            ]);
        });
    }
}
