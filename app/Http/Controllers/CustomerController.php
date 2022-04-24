<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function sendRequest(Request $request)
    {
        $requestData = [
            'name' => $request->name,
            'user_id' => $request->user_id,
            'email' => auth()->user()->email

        ];
        if (Customer::where('user_id', $request->user_id)->where('email', auth()->user()->email)->exists()) {
            return redirect()->back();
        } else {
            Customer::create($requestData);
            return redirect()->back();
        }
    }

    public function getCustomers()
    {
        return view('customer.index', [
            'customers' => Customer::latest()->get()
        ]);
    }

    public function accept(Customer $customer)
    {
        $customer->update([
            'status' => 1
        ]);

        return redirect()->route('customers')->with('success', 'Customer Accept Successfully!');
    }

    public function reject(Customer $customer)
    {
        $customer->update([
            'status' => 0
        ]);

        return redirect()->route('customers')->with('error', 'Customer rejected!');
    }
}
