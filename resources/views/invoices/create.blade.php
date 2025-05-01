@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-sm w-100 mb-4" style="max-width: 450px; margin-top: auto;">
        
        <div class="card-header d-flex justify-content-between align-items-center bg-white py-2 border-bottom">
        <h5 class="mb-0 fw-semibold">
    <a href="{{ route('invoice.index') }}" class="text-decoration-none text-primary" style="font-size: 0.875rem;">
        Show Invoices
    </a>
</h5>
            <button type="submit" form="invoiceForm" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Save
            </button>
        </div>

        <div class="card-body p-3">
            <form id="invoiceForm" action="{{ route('invoice.store') }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-12">
                        <label for="invoice_number" class="form-label small">Invoice Number</label>
                        <input type="text" class="form-control form-control-sm" id="invoice_number" name="invoice_number"
                            value="{{ old('invoice_number') }}" placeholder="INV-001" required>
                        @error('invoice_number')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="customer_id" class="form-label small">Customer</label>
                        <select class="form-select form-select-sm" id="customer_id" name="customer_id" required>
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="order_details" class="form-label small">Order Details</label>
                        <textarea class="form-control form-control-sm" id="order_details" name="order_details" rows="2"
                            placeholder="Enter order details" required>{{ old('order_details') }}</textarea>
                        @error('order_details')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="total_amount" class="form-label small">Total Amount</label>
                        <input type="number" class="form-control form-control-sm" id="total_amount" name="total_amount"
                            value="{{ old('total_amount') }}" placeholder="0.00" required>
                        @error('total_amount')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="advanced_payment" class="form-label small">Advanced Payment</label>
                        <input type="number" class="form-control form-control-sm" id="advanced_payment" name="advanced_payment"
                            value="{{ old('advanced_payment', '0.00') }}" placeholder="0.00">
                        @error('advanced_payment')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Modified Section: Discount and Status side by side -->
                    <div class="col-md-6">
                        <label for="discount" class="form-label small">Discount</label>
                        <input type="number" class="form-control form-control-sm" id="discount" name="discount"
                            value="{{ old('discount', '0.00') }}" placeholder="0.00">
                        @error('discount')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label small">Status</label>
                        <select class="form-select form-select-sm" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 6px;
        border: 1px solid rgba(0,0,0,.125);
    }
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid rgba(0,0,0,.1);
        padding: 0.5rem 1rem;
    }
    .form-control, .form-select {
        border-radius: 3px;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .invalid-feedback {
        font-size: 0.75rem;
    }
    .form-label {
        margin-bottom: 0.2rem;
    }
</style>
@endsection