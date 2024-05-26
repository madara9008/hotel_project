<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $customerTypes = CustomerType::all();
        return view('customers.index', compact('customers', 'customerTypes'));
    }

    public function create()
    {
        $filePath = public_path('assets/js/restcountries.json');

        if (file_exists($filePath)) {
            $countries = collect(json_decode(file_get_contents($filePath), true))->pluck('name.common')->sort();
        } else {
            $countries = collect();
        }
        $customerTypes = CustomerType::all();

        return view('customers.create', compact('countries', 'customerTypes'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_name' => 'required|string|max:50',
            'customertype_id' => 'required|exists:customer_types,id',
            'customer_code' => 'required|string|max:50',
            'sex' => 'required|string|in:M,F',
            'dob' => 'required|date',
            'phone' => 'required|string|max:50',
            'passportnumber' => 'required|string|max:200',
            'country' => 'required|string|max:50',
        ]);

        // Create a new customer
        $customer = Customer::create([
            'customer_name' => $request->input('customer_name'),
            'customertype_id' => $request->input('customertype_id'),
            'customer_code' => $request->input('customer_code'),
            'sex' => $request->input('sex'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'passportnumber' => $request->input('passportnumber'),
            'country' => $request->input('country'),
        ]);

        return Redirect::route('customer.index')->with('success', 'Customer created successfully');
    }

    public function edit($id)
    {
        try {
            $customers = Customer::findOrFail($id);
            $filePath = public_path('assets/js/restcountries.json');

            if (file_exists($filePath)) {
                $countries = collect(json_decode(file_get_contents($filePath), true))->pluck('name.common')->sort();
            } else {
                $countries = collect();
            }
            $customerTypes = CustomerType::all();

            return view('customers.edit', compact('customers', 'countries', 'customerTypes'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::route('customer.index')->with('error', 'Customer not found');
        }
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return Redirect::route('customer.index')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return Redirect::route('customer.index')->with('success', 'Customer deleted successfully');
        } catch (\Exception $e) {
            return Redirect::back()
                ->withInput()
                ->with('error', 'Error deleting customer: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
    }
}
