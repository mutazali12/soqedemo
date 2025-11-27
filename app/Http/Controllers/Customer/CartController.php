<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * عرض السلة
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product && $product->is_active) {
                $itemTotal = $product->price * $quantity;
                $total += $itemTotal;
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $itemTotal,
                ];
            }
        }

        return view('customer.cart.index', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    /**
     * إضافة منتج إلى السلة
     */
    public function add(Request $request, Product $product)
    {
        abort_if(!$product->is_active, 404);

        $quantity = max(1, intval($request->get('quantity', 1)));

        $cart = session()->get('cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => trans('messages.added_to_cart'),
            'cart_count' => count($cart),
        ]);
    }

    /**
     * تحديث الكمية في السلة
     */
    public function update(Request $request, Product $product)
    {
        $quantity = max(0, intval($request->get('quantity', 1)));
        $cart = session()->get('cart', []);

        if ($quantity === 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $quantity;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => trans('messages.cart_updated'),
        ]);
    }

    /**
     * إزالة منتج من السلة
     */
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => trans('messages.removed_from_cart'),
        ]);
    }

    /**
     * تفريغ السلة
     */
    public function clear()
    {
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'message' => trans('messages.cart_cleared'),
        ]);
    }
}
