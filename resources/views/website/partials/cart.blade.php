@if (session('cart'))
    @php
        $discountInPercent = array();
    @endphp
    @foreach (session('cart') as $id => $carts)

        @if ($carts['discount_type'] == 'Flat')
            @php
                array_push($discountInPercent, $carts['discount'] * $carts['qty']);
            @endphp
        @elseif ($carts['discount_type'] == 'Percent')
            @php
                $discountInPercent[] = ($carts['discount'] /   100 * $carts['price']) * $carts['qty'];
            @endphp
        @endif

        <div class="mx-4 row mt-4">
            <div class="col-md-5">
                <img height="90px" width="90px"
                     src="{{ asset('storage/' . $carts['image']) }}"
                     alt="">
            </div>
            <div class="col-md-5">
                <div>{{ $carts['title'] }}</div>
            </div>
            <div class="col-md-2">
                <a onclick="add_to_cart({{$id}}, 'remove')"
                   class="text-danger text-decoration-none float-end float-end fs-3"><i
                        class="fa fa-remove"></i></a>
            </div>
            <div class="col-12">
                <div class="pt-2">{{ $carts['qty'] }} x RS
                    {{ $carts['price'] }}
                </div>
                <div class="pt-3">
                    {{ $carts['discount_type'] == 'Flat' ? 'Flat' : 'Up to' }}
                    {{ $carts['discount'] }}% <span
                        class="text-primary">OFF</span>
                </div>
                {{-- <div>
                    @php
                        $discount = 0;
                        $discount += round($carts['price'] / $carts['discount'], 2);
                    @endphp
                    {{ $discount }}
                </div> --}}
            </div>
        </div>
        <hr>
    @endforeach
    <div class="mx-4">
        @php $subTotal = 0 @endphp
        @foreach ((array) session('cart') as $id => $carts)
            @php $subTotal += $carts['price'] * $carts['qty'];
            @endphp
        @endforeach
        @php
            $finalDiscount = array_sum($discountInPercent);
            $total = $subTotal - $finalDiscount;
        @endphp
        <hr>
        <div class="">SubTotal : ${{ $subTotal }}</div>
        <div class="">Discount : - ${{ $finalDiscount }}
        </div>
        <div class="fs-4">Total :  ${{ $total }}</div>
        <hr>
        <div class="text-center">
            <button onclick="view_cart()" class="btn btn-primary px-5">View Cart</button>
            <a href="{{route('checkout')}}" class="btn btn-primary px-5 mt-2">Checkout</a>
        </div>
    </div>
@else
    <div class="text-center fs-4 text-danger">Empty ! &#128540;</div>
    @endif
