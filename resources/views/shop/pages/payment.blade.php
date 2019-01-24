@extends('shop.index')
@section('content')
    @push('js')


        <script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{$key}}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        // console.log(token);
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>

    @endpush
    @push('css')


 <style>
     .StripeElement {
         background-color: white;
         height: 40px;
         padding: 10px 12px;
         border-radius: 4px;
         border: 1px solid transparent;
         box-shadow: 0 1px 3px 0 #e6ebf1;
         -webkit-transition: box-shadow 150ms ease;
         transition: box-shadow 150ms ease;
     }

     .StripeElement--focus {
         box-shadow: 0 1px 3px 0 #cfd7df;
     }

     .StripeElement--invalid {
         border-color: #fa755a;
     }

     .StripeElement--webkit-autofill {
         background-color: #fefde5 !important;
     }
 </style>
    @endpush



        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/E-commerce') }}">{{ trans('admin.home') }}</a>
                    </li>
                    <li>@awt('Checkout - Order review','en')</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <h1>@awt('Payment Gateway','ar')</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{url('E-commerce/address')}}"><i class="fa fa-map-marker"></i><br>@awt('Address','en')</a>
                        </li>

                        <li><a href="{{url('/E-commerce/payment-method')}}"><i class="fa fa-money"></i><br>@awt('Payment Method','en')</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('Order Review','en')</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-eye"></i><br>@awt('make your Payment','en') </a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="table-responsive">

                            {{--<form action="/payment" method="post" id="payment-form">--}}
{!! Form::open(['url'=>url('E-commerce/payment'),'method'=>'post','id'=>'payment-form']) !!}
                                <div class="form-row">
                                    <label for="card-element">
                                       @awt(' Credit or debit card','eb')
                                    </label>
                                    <br>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{url('/E-commerce/payment-method')}}" class="btn btn-default"><i @if(app('l') == 'en') class="fa fa-chevron-left"  @else class="fa fa-chevron-right"  @endif></i>@awt('Back to Payment method','en')</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">@awt('Place an order','en')<i
                                    @if(app('l') == 'en') class="fa fa-chevron-right"  @else class="fa fa-chevron-left"   @endif></i>
                            </button>
                        </div>
                    </div>
                    </form>

                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>{{ trans('admin.Order_summary') }}</h3>{{ trans('admin.Product') }}
                        </div>
                        <p class="text-muted">{{ trans('admin.Shipping_and_additional_costs_are_calculated_based_on_the_values_you_have_entered.') }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>{{ trans('admin.Order_subtotal') }}</td>
                                    <th>${{Cart::subtotal()}}</th>
                                </tr>

                                <tr>
                                    <td>{{ trans('admin.Tax') }}</td>
                                    <th>${{Cart::tax()}}</th>
                                </tr>
                                <tr class="total">
                                    <td>{{ trans('admin.total') }}</td>
                                    <th>{{Cart::total()}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->





@stop
