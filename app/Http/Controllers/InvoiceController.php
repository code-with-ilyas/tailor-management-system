<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function printInvoice($id)
    {
        // Retrieve the invoice from the database
        $invoice = Invoice::findOrFail($id);

        // Return the view for printing
        return view('invoices.invoice-print', compact('invoice'));
    }

    public function index()
    {
        // Paginate invoices
        $invoices = Invoice::paginate(5);
        return view('invoices.index', compact('invoices')); 
    }

    public function create()
    {
        // Pass customers to the view for selecting a customer
        $customers = User::all();
        return view('invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'invoice_number' => 'required|unique:invoices',  // Ensure invoice number is unique
            'customer_id' => 'required|exists:users,id',  // Ensure valid customer
            'order_details' => 'required',  // Ensure order details are provided
            'total_amount' => 'required|numeric',  // Ensure total amount is numeric
            'discount' => 'nullable|numeric',  // Discount can be null but must be numeric
            'advanced_payment' => 'nullable|numeric', // <-- New
            'status' => 'required|in:pending,paid',  // Ensure valid status
        ]);

        // Create the invoice
        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'customer_id' => $request->customer_id,
            'order_details' => $request->order_details,
            'total_amount' => $request->total_amount,
            'discount' => $request->discount ?? 0,  // Default discount to 0 if null
            'advanced_payment' => $request->advanced_payment ?? 0, // <-- New
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully!');
    }

   // In your InvoiceController.php
public function show($id)
{
    $invoice = Invoice::with('customer')->findOrFail($id);
    return view('invoices.show', compact('invoice'));
}
}


