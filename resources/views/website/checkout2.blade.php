@extends('layouts.website')
@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-5">
                <div class="text-center fs-3 mb-4">Summary</div>
                <table class="table border">
                    <thead>
                    <tr>
                        <th scope="col">Product Title</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(session('cart') as $id => $cart)
                        <tr>
                            <td>{{$cart['title']}}</td>
                            <td>{{$cart['qty']}}</td>
                            <td>${{$cart['price'] * $cart['qty']}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td  class="fw-bold">Sub Total</td>
                        <td>${{$subtotal}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td  class="fw-bold">Discount</td>
                        <td> - ${{$discount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td  class="fw-bold">Total</td>
                        <td>${{$total}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7 px-5">
                <div class="text-center my-3 mb-4">
                    <button class="border-0 me-2"><img class="rounded" width="100px" src="{{asset('website/images/stripe.png')}}" alt=""></button>
                    <button class="border-0"><img class="rounded" width="100px" src="{{asset('website/images/paypal.png')}}" alt=""></button>
                </div>
                <form accept-charset="UTF-8" action="{{route('stripe_post')}}" class="require-validation"
                      data-cc-on-file="false"
                      data-stripe-publishable-key="{{env('STRIPE_KEY')}}"
                      id="payment-form" method="post">
                    @csrf
                    <div class='form-row'>
                        <div class='required'>
                            <label class='control-label'>Card Number</label> <input
                                autocomplete='off' maxlength="16" class='form-control card-number' size='20'
                                type='text' placeholder="Enter Card number">
                        </div>
                    </div>
                    <div class='row'>
                        <div class=' col-md-4 required'>
                            <label class='control-label'>CVC</label> <input
                                autocomplete='off' class='form-control card-cvc'
                                placeholder='CVV' maxlength='3' type='text'>
                        </div>
                        <div class='col-md-4 required'>
                            <label class='control-label'>Expiration</label> <input
                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
                        </div>
                        <div class='col-md-4 required'>
                            <label class='control-label'>YEAR</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY'
                                size='4' type='text'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-md-12 '>
                            <button class='form-control btn btn-primary submit-button'
                                    type='submit' style="margin-top: 10px;">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <script>
        $(function() {
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(e.target).closest('form'),
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
                        e.preventDefault(); // cancel on first error
                    }
                });
            });
        });

        $(function() {
            var $form = $("#payment-form");

            $form.on('submit', function(e) {
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
                    toastMixin.fire({
                        animation: true,
                        icon: 'error',
                        title:response.error.message
                    });
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    console.log(token);
                    $form.get(0).submit();
                }
            }
        });
    </script>
    <script>

        $(document).ready(function () {

            @if ((Session::has('success-message')))
            toastMixin.fire({
                animation: true,
                title: '{{ Session::get('success-message') }}'
            });
            @elseif((Session::has('fail-message')))
            toastMixin.fire({
                animation: true,
                icon: 'error',
                title: '{{ Session::get('fail-message') }}'
            });
            @endif
        })
    </script>
@endsection
