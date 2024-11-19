@extends('layouts.app')

@section('styles')
<style>
    .StripeElement {
        background-color: white;
        padding: 8px 12px;
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
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <form action={{route('single.charge')}} method="POST" id="subscribe-form">
                        <input type="number" name="amount" id="amount" class="form-control"><br>
                        <label for="card-holder-name">Card Holder Name</label><br>
                        <input id="card-holder-name" type="text">
                        @csrf
                        <div class="form-row">
                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element" class="form-control">
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="stripe-errors"></div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group text-center">
                            <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">SUBMIT</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
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
    const card = elements.create('card', { hidePostalCode: true, style: style });
card.mount('#card-element');

const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;
const cardHolderName = document.getElementById('card-holder-name');

if (!clientSecret) {
    console.error("clientSecret is not defined. Ensure it's passed from the backend.");
}

if (!cardHolderName) {
    console.error("Cardholder name input not found. Check the input's ID.");
}

cardButton.addEventListener('click', async (e) => {
    e.preventDefault();
    console.log("Button clicked, attempting setup...");

    const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, {
        payment_method: {
            card: card,
            billing_details: { name: cardHolderName.value }
        }
    });

    if (error) {
        console.error("Error during card setup: ", error.message);
        document.getElementById('card-errors').textContent = error.message;
    } else {
        console.log("Card setup successful, handling payment method...");
        paymentMethodHandler(setupIntent.payment_method);
    }
});

function paymentMethodHandler(payment_method) {
    console.log("Handling payment method: ", payment_method);
    const form = document.getElementById('subscribe-form');

    if (!form) {
        console.error("Form not found. Ensure the form has the correct ID.");
        return;
    }

    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'paymentMethod');
    hiddenInput.setAttribute('value', payment_method);

    form.appendChild(hiddenInput);

    console.log("Submitting form...");
    form.submit();
}

</script>


@endsection