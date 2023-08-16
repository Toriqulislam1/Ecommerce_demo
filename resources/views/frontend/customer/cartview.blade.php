@extends('frontend.frontend_master')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                        $sub_total = 0;
                      @endphp

                        @foreach ($carts as  $cart)

                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{ $cart->rel_to_product->product_name }}</td>
                            <td class="align-middle">{{ $cart->rel_to_product->after_discount  }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><a href="{{ route('cart-delete',$cart->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>


                                 @php
                                    $sub_total += $cart->rel_to_product->after_discount*$cart->quantity;
                                  @endphp
                        @endforeach

                    </tbody>

                </table>
            </div>

            @php
            if ($type == 1) {

                $after_discount = $sub_total - ($sub_total*$discount)/100;
                }

            else{

                $after_discount = $discount;


            }

        @endphp



            <div class="col-lg-4">
                {{ $message }}
                <form class="mb-5" action="{{ route('cart-view') }} " method="GET">
                    <div class="input-group">
                        <input type="text" name="coupon" class="form-control p-4" value="{{ $coupon }}" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{$sub_total }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">100</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6 class="font-weight-medium">{{ $after_discount }}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $sub_total - $after_discount +100}}</h5>
                        </div>

                        @php
                        session([
                            'total'=>$sub_total - $after_discount +100,
                        ])
                    @endphp

                        <a href="{{ route('checkout-view',) }}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    @endsection
