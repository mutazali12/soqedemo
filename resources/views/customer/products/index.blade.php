@extends('layouts.app')

@section('title', __('products.browse_products'))

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">@lang('filters.filters')</h5>
                    
                    <form action="{{ route('customer.products.index') }}" method="GET">
                        <!-- Search -->
                        <div class="mb-4">
                            <label class="form-label">@lang('filters.search')</label>
                            <input type="text" name="search" class="form-control" placeholder="ابحث عن منتج..." 
                                value="{{ request('search') }}">
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label class="form-label">@lang('filters.category')</label>
                            <select name="category" class="form-select">
                                <option value="">@lang('filters.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label class="form-label">@lang('filters.price_range')</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="price_min" class="form-control" 
                                        placeholder="من" value="{{ request('price_min') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="price_max" class="form-control" 
                                        placeholder="إلى" value="{{ request('price_max') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div class="mb-4">
                            <label class="form-label">@lang('filters.sort_by')</label>
                            <select name="sort" class="form-select">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>
                                    @lang('filters.latest')
                                </option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>
                                    @lang('filters.popular')
                                </option>
                                <option value="best_rating" {{ request('sort') == 'best_rating' ? 'selected' : '' }}>
                                    @lang('filters.best_rating')
                                </option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                    @lang('filters.price_low_to_high')
                                </option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                    @lang('filters.price_high_to_low')
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel"></i> @lang('filters.apply')
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            @if ($products->count() > 0)
                <div class="row g-4">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 product-card">
                                <div class="position-relative">
                                    <img src="{{ $product->image ?? '/placeholder.svg?height=250&width=300' }}" 
                                        class="card-img-top" alt="{{ $product->name }}">
                                    @if ($product->hasDiscount())
                                        <div class="badge bg-danger position-absolute top-0 end-0 m-2">
                                            -{{ $product->getDiscountPercentage() }}%
                                        </div>
                                    @endif
                                    @if (!$product->isAvailable())
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <span class="badge bg-dark">@lang('products.out_of_stock')</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">{{ $product->name }}</h6>
                                    <p class="text-muted small mb-2">{{ $product->store->name }}</p>
                                    
                                    <div class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                @if ($product->hasDiscount())
                                                    <span class="text-decoration-line-through text-muted small">
                                                        {{ number_format($product->original_price, 2) }} ر.س
                                                    </span>
                                                @endif
                                                <span class="text-primary fw-bold">
                                                    {{ number_format($product->price, 2) }} ر.س
                                                </span>
                                            </div>
                                            <div class="text-warning small">
                                                <i class="bi bi-star-fill"></i> {{ $product->rating }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('customer.products.show', $product->id) }}" 
                                            class="btn btn-sm btn-outline-primary w-100 mb-2">
                                            @lang('products.view_details')
                                        </a>
                                        @if ($product->isAvailable())
                                            <button class="btn btn-sm btn-primary w-100 add-to-cart" 
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-bag-plus"></i> @lang('products.add_to_cart')
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-secondary w-100" disabled>
                                                @lang('products.unavailable')
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-5">
                    {{ $products->links() }}
                </div>
            @else
                <div class="alert alert-info text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                    <p class="mt-3">@lang('products.no_products_found')</p>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const productId = this.dataset.productId;
        const btn = this;

        fetch(`/customer/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ quantity: 1 })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Show toast or notification
                alert(data.message);
                btn.innerHTML = '<i class="bi bi-check-circle"></i> @lang("products.added")';
                btn.disabled = true;
            }
        });
    });
});
</script>
@endsection
