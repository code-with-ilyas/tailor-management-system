@extends('layouts.master')

@section('content')
<div class="container d-flex flex-column justify-content-start align-items-center" style="min-height: 90vh; padding-top: 120px;">
    <div class="w-100" style="max-width: 600px;">

        <!-- Invoice Card -->
        <div class="card shadow-sm mb-3">
            <!-- Card Header with Title and Print Button -->
            <div class="card-header d-flex justify-content-between align-items-center bg-white py-2 border-bottom">
            <h5 class="mb-0 fw-semibold">
    <a href="{{ route('invoice.index') }}" class="text-decoration-none text-primary" style="font-size: 0.875rem;">
        Show Invoices
    </a>
</h5>
                <a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-printer"></i> Print Invoice
                </a>
            </div>

            <!-- Invoice Details -->
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>Invoice Number:</strong></td>
                            <td>{{ $invoice->invoice_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Customer Name:</strong></td>
                            <td>{{ $invoice->customer->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Order Details:</strong></td>
                            <td>{{ $invoice->order_details }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount:</strong></td>
                            <td>{{ number_format($invoice->total_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Discount:</strong></td>
                            <td>{{ number_format($invoice->discount, 2) ?? '0.00' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Advanced Payment:</strong></td>
                            <td>{{ number_format($invoice->advanced_payment, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                <span class="badge {{ $invoice->status == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Total Payable:</strong></td>
                            <td>{{ number_format(($invoice->total_amount - $invoice->discount - $invoice->advanced_payment), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection