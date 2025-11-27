<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Store;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * صفحة الدفع
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        abort_if(empty($cart), 404);

        $items = [];
        $subtotal = 0;
        $stores = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product && $product->is_active && $product->stock >= $quantity) {
                $storeId = $product->store_id;
                if (!isset($stores[$storeId])) {
                    $stores[$storeId] = Store::find($storeId);
                }

                $itemTotal = $product->price * $quantity;
                $subtotal += $itemTotal;
                $items[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $itemTotal,
                ];
            }
        }

        $tax = $subtotal * 0.15; // ضريبة 15%
        $deliveryFee = 50; // رسم التوصيل
        $total = $subtotal + $tax + $deliveryFee;

        return view('customer.checkout.index', [
            'items' => $items,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'deliveryFee' => $deliveryFee,
            'total' => $total,
        ]);
    }

    /**
     * معالجة الطلب
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        abort_if(empty($cart), 404);

        $user = auth()->user();

        $validated = $request->validate([
            'phone' => 'required|phone',
            'address' => 'required|string',
            'payment_method' => 'required|in:cash,card',
            'coupon' => 'nullable|string',
        ]);

        // معالجة الطلب لكل متجر على حدة
        $stores = [];
        $totalAmount = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);

            if (!$product || !$product->is_active || $product->stock < $quantity) {
                return back()->withErrors('المنتج غير متوفر');
            }

            $storeId = $product->store_id;

            if (!isset($stores[$storeId])) {
                $stores[$storeId] = [
                    'items' => [],
                    'subtotal' => 0,
                ];
            }

            $itemTotal = $product->price * $quantity;
            $stores[$storeId]['items'][$productId] = [
                'product' => $product,
                'quantity' => $quantity,
                'total' => $itemTotal,
            ];
            $stores[$storeId]['subtotal'] += $itemTotal;
            $totalAmount += $itemTotal;
        }

        // إنشاء الطلبات
        $orders = [];
        $tax = $totalAmount * 0.15;
        $deliveryFee = 50;

        foreach ($stores as $storeId => $storeData) {
            $order = Order::create([
                'order_number' => 'ORD-' . time() . '-' . $storeId,
                'customer_id' => $user->id,
                'store_id' => $storeId,
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_method'] === 'cash' ? 'pending' : 'pending',
                'subtotal' => $storeData['subtotal'],
                'tax' => $tax,
                'delivery_fee' => $deliveryFee,
                'total' => $storeData['subtotal'] + $tax + $deliveryFee,
                'customer_address' => $validated['address'],
                'customer_phone' => $validated['phone'],
                'status' => 'pending',
            ]);

            // إضافة عناصر الطلب
            foreach ($storeData['items'] as $productId => $itemData) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $itemData['quantity'],
                    'price' => $itemData['product']->price,
                    'total' => $itemData['total'],
                ]);

                // تحديث المخزون
                $itemData['product']->decrement('stock', $itemData['quantity']);
                $itemData['product']->increment('sold_count', $itemData['quantity']);
            }

            $orders[] = $order;
        }

        // تفريغ السلة
        session()->forget('cart');

        // إعادة التوجيه إلى صفحة النجاح
        return redirect()->route('customer.orders.show', $orders[0]->id)
            ->with('success', trans('messages.order_created_successfully'));
    }
}
