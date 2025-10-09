<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - #{{ $order->orderNo }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
            background: #f9f9f9;
        }

        .print-btn {
            display: inline-block;
            float: right;
            margin: 0px 291px 0 0;
            padding: 6px 14px;
            background: #1a57ff;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
        }
        .print-btn:hover { background: #0f3bb3; }
        @media print { .print-btn { display: none; } }

        .invoice-box {
            max-width: 750px;   /* proper width */
            margin: 20px auto;  /* centered */
            padding: 25px 30px;
            border: 1px solid #eee;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        /* Store Header */
        .store-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #1a57ff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .store-info { text-align: right; }
        .store-info h2 { margin: 0; color: #1a57ff; font-size: 20px; }
        .store-info small { color: #555; font-size: 12px; }

        /* Invoice Meta */
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .header h3 { margin: 0; color: #333; }

        /* Tables */
        .details, .items { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .details td { padding: 6px; vertical-align: top; }

        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items th {
            background: #f1f5ff;
            color: #1a57ff;
            font-weight: bold;
        }

        /* Total */
        .total {
            text-align: right;
            margin-top: 15px;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="javascript:void(0);" class="print-btn" onclick="window.print()">🖨 Print</a>

    <div class="invoice-box">
        <!-- Store Header -->
        <div class="store-header">
            <div>
                <img src="{{ asset('img/logo1.png') }}" alt="Logo" style="height:50px;">
            </div>
            <div class="store-info">
                <h2>Medical & Surgical Mega Mart</h2>
                <small>123 Health Street, City Name, State</small><br>
                <small>Phone: +91-9876543210 | Email: support@megamedmart.com</small>
            </div>
        </div>

        <!-- Invoice Meta -->
        <div class="header">
            <div>
                <h3>Invoice</h3>
                <strong>Invoice #: </strong>{{ $order->orderNo }}<br>
                <strong>Date: </strong>{{ $order->created_at->format('d M Y') }}
            </div>
        </div>

        <!-- Billing & Shipping -->
        <table class="details">
            <tr>
                <td>
                    <strong>Billed To:</strong><br>
                    {{ $order->customer->name }}<br>
                    {{ $order->customer->email }}<br>
                    {{ $order->customer->phone }}
                </td>
                <td>
                    <strong>Shipping Address:</strong><br>
                    {{ $order->shipping_address ?? '-' }}
                </td>
            </tr>
        </table>

        <!-- Items -->
        <table class="items">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ formatRupees($item->price) }}</td>
                    <td>{{ formatRupees($item->total_price) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total -->
        <div class="total">
            Total: {{ formatRupees($order->total_price) }}
        </div>
    </div>
</body>
</html>
