<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * عرض قائمة المنتجات
     */
    public function index(Request $request)
    {
        $query = Product::query()->where('is_active', true);

        // البحث
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereRaw("MATCH(name_ar, description_ar, name_en, description_en) AGAINST(? IN BOOLEAN MODE)", [$search])
                    ->orWhere('sku', 'like', "%$search%");
            });
        }

        // التصفية حسب الفئة
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        // التصفية حسب السعر
        if ($request->has('price_min') && !empty($request->price_min)) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max') && !empty($request->price_max)) {
            $query->where('price', '<=', $request->price_max);
        }

        // الترتيب
        $sort = $request->get('sort', 'latest');
        match($sort) {
            'popular' => $query->orderBy('sold_count', 'desc'),
            'best_rating' => $query->orderBy('rating', 'desc'),
            'price_low' => $query->orderBy('price', 'asc'),
            'price_high' => $query->orderBy('price', 'desc'),
            default => $query->latest(),
        };

        $products = $query->with(['store', 'category', 'images'])
            ->paginate(12);

        $categories = Category::where('is_active', true)->get();

        return view('customer.products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * عرض تفاصيل المنتج
     */
    public function show(Product $product)
    {
        abort_if(!$product->is_active, 404);

        $product->load(['store', 'category', 'images', 'reviews']);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('customer.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    /**
     * البحث السريع (AJAX)
     */
    public function search(Request $request)
    {
        if (empty($request->q) || strlen($request->q) < 2) {
            return response()->json(['results' => []]);
        }

        $results = Product::where('is_active', true)
            ->whereRaw("MATCH(name_ar, name_en) AGAINST(? IN BOOLEAN MODE)", [$request->q])
            ->limit(10)
            ->get(['id', 'name_ar', 'name_en', 'price', 'image']);

        return response()->json([
            'results' => $results
        ]);
    }
}
