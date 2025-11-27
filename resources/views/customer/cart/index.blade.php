@extends('layouts.app')

@section('title', __('cart.shopping_cart'))

@section('content')
<div class="container">
    @if (count($items) > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">@lang('cart.cart_items') ({{ count($items) }})</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($items as $item)
                            <div class="row border-bottom pb-3 mb-3">
                                <div class="col-md-2">
                                    <img src="{{ $item['product']->image ?? '/placeholder.svg?height=100&width=100' }}" 
                                        class="img-fluid rounded" alt="{{ $item['product']->name }}">
                                </div>
                                <div class="col-md-5">
                                    <h6>{{ $item['product']->name }}</h6>
                                    <p class="text-muted small">{{ $item['product']->store->name }}</p>
                                    <p class="text-primary fw-bold">{{ number_format($item['product']->price, 2) }} ر.س</p>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">@lang('cart.quantity')</label>
                                    <div class="input-group input-group-sm">
                                        <button class="btn btn-outline-secondary btn-sm decrease-qty" 
                                            data-product-id="{{ $item['product']->id }}">-</button>
                                        <input type="number" class="form-control text-center" value="{{ $item['quantity'] }}" 
                                            data-product-id="{{ $item['product']->id }}" readonly>
                                        <button class="btn btn-outline-secondary btn-sm increase-qty" 
                                            data-product-id="{{ $item['product']->id }}">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <p class="fw-bold mb-2">{{ number_format($item['total'], 2) }} ر.س</p>
                                    <button class="btn btn-sm btn-danger remove-item" 
                                        data-product-id="{{ $item['product']->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card sticky-top" style="top: 80px;">
                    <div class="card-body">
                        <h5 class="card-title">@lang('cart.order_summary')</h5>
                        
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>@lang('cart.subtotal')</span>
                                <strong>{{ number_format($total, 2) }} ر.س</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>@lang('cart.tax')</span>
                                <strong>{{ number_format($total * 0.15, 2) }} ر.س</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>@lang('cart.delivery_fee')</span>
                                <strong>50.00 ر.س</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>@lang('cart.total')</strong>
                                <strong class="text-primary" style="font-size: 1.25rem;">
                                    {{ number_format($total + ($total * 0.15) + 50, 2) }} ر.س
                                </strong>
                            </div>
                        </div>

                        <a href="{{ route('customer.checkout.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-credit-card"></i> @lang('cart.proceed_to_checkout')
                        </a>
                        <a href="{{ route('customer.products.index') }}" class="btn btn-outline-secondary w-100">
                            @lang('cart.continue_shopping')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-bag-x" style="font-size: 3rem;"></i>
            <p class="mt-3">@lang('cart.cart_is_empty')</p>
            <a href="{{ route('customer.products.index') }}" class="btn btn-primary">
                @lang('cart.start_shopping')
            </a>
        </div>
    @endif
</div>
@endsection
