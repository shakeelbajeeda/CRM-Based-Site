@extends('layouts.website')
@section('content')
    <div style="background: #0e2b5c!important;">
        <div class="container">
            <section class="shop-collection-area pt-30 pb-130 them_bg_color">
                <div class="container">
                    <div class="px-4 px-lg-0">
                        <!-- For demo purpose -->
                        <div class="container text-white py-5 text-center">
                            <h3 class="display-5" style="color: white;">My Cart</h3>
                            </p>
                        </div>
                        <!-- End -->

                        <div class="pb-5">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 p-5 bg-white rounded shadow-sm mb-5">
                                       @if(session('cart'))
                                        <!-- Shopping cart table -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Title</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Price</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Discount</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Quantity</div>
                                                    </th>
                                                    <th scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Remove</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(session('cart') as $id => $cart)
                                                        @php
                                                        if($cart['discount_type']=='Percent'){
                                                            $discount = $cart['discount'] /   100 * $cart['price'] * $cart['qty'];
                                                        }
                                                        else{
                                                            $discount = $cart['discount'] * $cart['qty'];
                                                        }
                                                        @endphp
                                                <tr style="border-bottom: 1px solid rgba(0,0,0,0.23)">
                                                    <th scope="row" class="border-0">
                                                        <div class="p-2">
                                                            <div class="ml-3 d-inline-block align-middle">
                                                                <img height="100px" width="100px" src="{{asset('storage/'. $cart['image'])}}" alt="">
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td class="border-0 align-middle"><strong>{{$cart['title']}}</strong></td>
                                                    <td class="border-0 align-middle"><strong>${{$cart['price']* $cart['qty']}}</strong></td>
                                                    <td class="border-0 align-middle"><strong>${{$discount}}</strong></td>
                                                    <td class="border-0 align-middle"><strong>{{$cart['qty']}}</strong></td>
                                                    <td id="6e80df3eb8d938176641c04ae54f50ec" class="border-0 align-middle"><a href="{{route('cart.destroy', $id)}}" class="text-dark" ><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                       @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- End -->
                                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                                            <a href="{{route('checkout')}}" class="btn btn-dark rounded-pill py-2 btn-block custom_btn">Proceed to checkout</a>
                                        </div>
                                        @else
                                           <div class="text-center fs-2">Empty Cart</div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
