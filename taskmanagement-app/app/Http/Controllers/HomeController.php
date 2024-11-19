<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =auth()->user();
        return view('home',[
            'intent' => $user->createSetupIntent(),
        ]);
    }
    public function singleCharge(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'paymentMethod' => 'required|string',
        ]);
    
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
    
        $paymentMethodId = $request->paymentMethod;
        $amount = $request->amount;
    
        try {
            $paymentMethod = $user->addPaymentMethod($paymentMethodId);
    
            // Use confirmation_method instead of automatic_payment_methods
            $paymentOptions = [
                'confirmation_method' => 'manual', // Use manual confirmation
                'return_url' => route('home'), // Optional: Add a return URL if redirect is needed
            ];
    
            // Charge the user
            $user->charge($amount * 100, $paymentMethod->id, $paymentOptions); // Stripe accepts amount in cents
        } catch (\Exception $e) {
            return back()->withErrors('Error processing payment: ' . $e->getMessage());
        }
    
        return redirect()->route('home')->with('status', 'Payment successful!');
    }
    
    
    
    
    
}
