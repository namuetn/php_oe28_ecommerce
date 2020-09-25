@extends('master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ trans('header.home') }}</a>
                        <a href="#">{{ trans('header.shop') }}</a>
                        <span>{{ trans('text.shopping_cart') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('update_cart') }}">
                        @csrf
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ trans('text.image') }}</th>
                                        <th class="p-name">{{ trans('text.product_name') }}</th>
                                        <th>{{ trans('text.price') }}</th>
                                        <th>{{ trans('text.quantity') }}</th>
                                        <th>{{ trans('text.total') }}</th>
                                        <th><i style="cursor: pointer;" class="ti-close remove-all"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="cart-body">
                                    @php $totalPrice = 0; @endphp
                                    @if (isset($cart))
                                        @foreach ($cart as $productCart)
                                            <tr>
                                                <td class="cart-pic first-row"><img src="{{ asset('bower_components/bower_fashi_shop/img/cart-page/product-1.jpg') }}" alt=""></td>
                                                <td class="cart-title first-row">
                                                    <h5>{{ $productCart['name'] }}</h5>
                                                </td>
                                                <td class="p-price first-row">${{ $productCart['price'] }}</td>
                                                <td class="qua-col first-row">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="text" name="quantity[{{ $productCart['product_detail_id'] }}]" value="{{ $productCart['quantity'] }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-price first-row">${{ $subTotal = $productCart['price'] * $productCart['quantity'] }}</td>
                                                <td class="close-td first-row"><i class="ti-close remove-one-item" data-product-detail-id="{{ $productCart['product_detail_id'] }}"></i></td>
                                            </tr>
                                            @php $totalPrice += $subTotal; @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="{{ route('product.index') }}" class="primary-btn continue-shop">{{ trans('text.continue_shopping') }}</a>
                                    <input class="primary-btn up-cart" type="submit" name="" value="{{ trans('text.update_cart') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        {{-- <li class="subtotal">Subtotal <span>$240.00</span></li> --}}
                                        <li class="cart-total">{{ trans('text.total_price') }}<span>${{ $totalPrice }}</span></li>
                                    </ul>
                                    <a href="#" class="proceed-btn">{{ trans('text.check_out') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
