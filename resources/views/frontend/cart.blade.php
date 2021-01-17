
@extends('layouts.frontend_app')

@section('frontend_content')

    <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Shopping Cart</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><span>Shopping Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
        <!-- cart-area start -->
        <div class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                <!-- {{ print_r(session()->all()) }} -->
                    <div class="col-12">
                        @if (session('remove_status'))
                        <div class="alert alert-danger">
                            {{ session('remove_status') }}
                        </div>
                        @endif
                        @if (session('update_status'))
                        <div class="alert alert-info">
                            {{ session('update_status') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if ( $error_message != "" )
                            <div class="alert alert-danger">
                            {{ $error_message }}
                            </div>
                        @endif
                        <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images">Image</th>
                                        <th class="product">Product</th>
                                        <th class="ptice">Price</th>
                                        <th class="quantity">Quantity</th>
                                        <th class="total">Total</th>
                                        <th class="remove">Remove</th>
                                        <th class="update">update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sub_total=0;
                                        $flag=0;
                                    @endphp
                                    @forelse (cart_items() as $cart_item)
                                        <tr class="{{ ($cart_item->product->product_quantity < $cart_item->product_quantity)?'bg-danger':'' }}">
                                            <td class="images"><img src="{{ asset('uploads/product_photos') }}/{{ $cart_item->product->product_thumbnail_photo }}" alt=""></td>
                                            <td class="product"><a href="{{ url('product/details') }}/{{ $cart_item->product->slug }}" target="_blank">{{ $cart_item->product->product_name }}</a>
                                                <br>
                                                @if ($cart_item->product->product_quantity < $cart_item->product_quantity)
                                                    <span>available quantity is:{{ $cart_item->product->product_quantity }}.you have to reduce product to availability</span>
                                                @php
                                                    $flag=1;
                                                @endphp
                                                @endif
                                            </td>
                                            <td class="ptice">${{ $cart_item->product->product_price }}</td>
                                            <td class="quantity cart-plus-minus">
                                                <input type="text" value="{{ $cart_item->product_quantity }}" name="product_info[{{ $cart_item->id }}]"/>
                                            </td>
                                            <td class="total">${{ $cart_item->product->product_price * $cart_item->product_quantity }}</td>
                                            <td>
                                                <a href="{{ route('cart.remove',$cart_item->id) }}" type="button" class="btn btn-danger btn-sm">remove</a>
                                                </div>
                                            </td>
                                            <td class="ptice"><button type="submit" class="btn btn-info">Update Cart</button></td>
                                        </tr>
                                        @php
                                            $sub_total += ($cart_item->product_quantity * $cart_item->product->product_price)
                                        @endphp
                                        @empty
                                            <div class="alert alert-danger">
                                                    no date available
                                            </div>
                                    @endforelse
                                </tbody>
                            </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            {{-- <button type="submit">Update Cart</button> --}}
                        </form>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" placeholder="Cupon Code" id="apply_coupon_input" value="{{ $coupon_name }}">
                                        <button id="apply_coupon_btn" type="button">Apply Cupon</button>
                                    </div>
                                    @foreach ($valid_coupons as $valid_coupon)
                                        <button value="{{ $valid_coupon->coupon_name }}" class="btn btn-info available_coupon_btn" type="button">{{ $valid_coupon->coupon_name }}-shop more or equal (${{ $valid_coupon->minimum_purchase_amount }})</button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $sub_total }}</li>
                                        @php
                                        session(['sub_total' => $sub_total]);
                                        @endphp
                                        <li><span class="pull-left">discount(%) </span>{{ $discount_amount }}%</li> 
                                        <li><span class="pull-left">discount({{ ($coupon_name)?: '-' }})</span>{{ ($sub_total * $discount_amount)/100 }}%</li>
                                        @php
                                        session(['coupon_name' =>($coupon_name)?: '-']);
                                        session(['discount_amount' =>(($sub_total * $discount_amount)/100)]);
                                        @endphp
                                        <li><span class="pull-left"> Total </span>{{ $sub_total-(($sub_total * $discount_amount)/100 ) }}</li>
                                    </ul>
                                    @if ($flag==1)
                                            <a href="checkout.html">pls delete excess product</a>
                                    @else
                                        <a href="{{ url('checkout') }}">Proceed to Checkout</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-area end -->
@endsection
@section('footer_scripts')
<script>
$(document).ready(function(){
    $('#apply_coupon_btn').click(function(){
        var apply_coupon_input=$('#apply_coupon_input').val();
        var link_to_go="{{ url('cart') }}/"+apply_coupon_input;
        window.location.href=link_to_go;
    });
    $('.available_coupon_btn').click(function(){
        $('#apply_coupon_input').val($(this).val());
    });
});

</script>
@endsection
