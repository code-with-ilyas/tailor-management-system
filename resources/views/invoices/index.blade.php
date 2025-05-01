@extends('layouts.master')

@section('content')
<div class="container d-flex flex-column justify-content-start align-items-center" style="min-height: 90vh; padding-top: 120px;">
    <div class="w-100" style="max-width: 600px;">

        <!-- Heading Card -->
        <div class="card shadow-sm mb-3">
            <div class="card-body d-flex justify-content-between align-items-center py-2 px-3">
            <h2 class="mb-0 text-primary fs-4">Invoices</h2>
                <a href="{{ route('invoice.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Create New Invoice
                </a>
            </div>
        </div>

        <!-- Invoice Table Card -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S.No</th>
                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $startingNumber = ($invoices->currentPage() - 1) * $invoices->perPage();
                            @endphp
                            @forelse ($invoices as $index => $invoice)
                                <tr>
                                    <td>{{ $startingNumber + $loop->iteration }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->customer->name ?? '-' }}</td>
                                    <td>{{ number_format($invoice->total_amount, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $invoice->status == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-sm btn-outline-secondary">
                                            Show
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-3">
                                        No invoices found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center py-3">
                    {{ $invoices->links() }}
                </div>

            </div>
        </div>

    </div>
</div>
@endsection