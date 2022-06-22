@extends('layouts.website')
@section('content')
<style>
    .bg {
        background-color:#f5eee7;
        border-radius: 10px;
    }
    .card{
        border: none;
    }

    .card-header {
        padding: .5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03);
        border-bottom: none;
    }

    .btn-light:focus {
        color: #212529;
        background-color: #e2e6ea;
        border-color: #dae0e5;
        box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
    }

    .form-control{

        height: 50px;
        border: 2px solid #eee;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #039be5;
        outline: 0;
        box-shadow: none;

    }

    .input{

        position: relative;
    }

    .input i{

        position: absolute;
        top: 16px;
        left: 11px;
        color: #989898;
    }

    .input input{

        text-indent: 25px;
    }

    .card-text{

        font-size: 13px;
        margin-left: 6px;
    }

    .certificate-text{

        font-size: 12px;
    }


    .billing{
        font-size: 11px;
    }

    .super-price{

        top: 0px;
        font-size: 22px;
    }

    .super-month{

        font-size: 11px;
    }


    .line{
        color: #bfbdbd;
    }

    .free-button{

        background: #1565c0;
        height: 52px;
        font-size: 15px;
        border-radius: 8px;
    }


    .payment-card-body{

        flex: 1 1 auto;
        padding: 24px 1rem !important;

    }
</style>
@if(session('cart'))
<div class="container d-flex justify-content-center mt-5 mb-5 bg py-5">
    <div class="row g-3">
        <div class="col-md-6">
            <span>Payment Method</span>
            <div class="card w-100">
                <div class="accordion" id="accordionExample">
                    <div class="card w-100">
                        <div class="card-header p-0" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="w-100 btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="w-100 d-flex align-items-center justify-content-between">

                                        <span>Paypal</span>
                                        <img src="https://i.imgur.com/7kQEsHU.png" width="30">

                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="w-100 collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <input type="text" class="form-control" placeholder="Paypal email">
                            </div>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="w-100 card-header p-0">
                            <h2 class="mb-0">
                                <button class="w-100 btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="d-flex align-items-center justify-content-between">

                                        <span>Credit card</span>
                                        <div class="icons">
                                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                            <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                            <img src="https://i.imgur.com/35tC99g.png" width="30">
                                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                        </div>

                                    </div>
                                </button>
                            </h2>
                        </div>
                        <form
                            role="form"
                            action="{{ route('stripe_post') }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body payment-card-body">

                                    <span class="font-weight-normal card-text">Name on Card</span>
                                    <div class="input">

                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" placeholder="Name on card">

                                    </div>
                                    <span class="font-weight-normal card-text">Card Number</span>
                                    <div class="input">

                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control card-number" placeholder="0000 0000 0000 0000">

                                    </div>

                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-4">
                                            <span class="font-weight-normal card-text">CVC/CVV</span>
                                            <div class="input">
                                                <i class="fa fa-lock"></i>
                                                <input type="text" class="form-control card-cvc" placeholder="000">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <span class="font-weight-normal card-text">Expiry Month</span>
                                            <div class="input">

                                                <i class="fa fa-calendar"></i>
                                                <input type="text" class="form-control card-expiry-month" placeholder="MM">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="font-weight-normal card-text">Expiry Year</span>
                                            <div class="input">

                                                <i class="fa fa-calendar"></i>
                                                <input type="text" class="form-control card-expiry-year" placeholder="YY">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                                    <div class="p-3">
                                        <button class="btn btn-primary btn-block free-button" type="submit">Confirm Order</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
 @php
        $discountInPercent = array();
    foreach (session('cart') as $id => $cart){
        if ($cart['discount_type'] == 'Flat'){
            array_push($discountInPercent, $cart['discount'] * $cart['qty']);
        }
        else{
            $discountInPercent[] = ($cart['discount'] /   100 * $cart['price']) * $cart['qty'];
    }
    }
       $subTotal = 0 ;
        foreach ((array) session('cart') as $id => $cart){
                     $subTotal += $cart['price'] * $cart['qty'];
        }
    $finalDiscount = array_sum($discountInPercent);
    $total = $subTotal - $finalDiscount;
 @endphp
        <div class="col-md-6">
            <span>Summary</span>

            <div class="card w-100">

                <div class="d-flex justify-content-between p-3 mt-4">
                        <span>Order Subtotal</span>
                    <div class="mt-1">
                        <sup class="super-price">{{$subTotal}}</sup>
                        <span class="super-month">/RS</span>
                    </div>
                </div>
                <hr class="mt-0 line">
                <div class="p-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Discount</span>
                        <div class="mt-1">
                            <sup class="super-price">{{$finalDiscount}}</sup>
                            <span class="super-month">/RS</span>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 line">
                <div class="p-3 d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <span>Total Payable Amount</span>
                    </div>
                    <div class="mt-1">
                        <sup class="super-price">{{$total}}</sup>
                        <span class="super-month">/RS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="bg-secondary py-5 text-center">
        <button class="text-center btn btn-danger fs-1 disabled rounded-pill">Please add product to the cart first !</button>
    </div>
@endif
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
@endsection
