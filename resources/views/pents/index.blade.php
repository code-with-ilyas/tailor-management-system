@extends('layouts.master')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 800px;">

        <!-- Card Body -->
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success mb-4 rounded-0 text-center border-top-0">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table Section -->
            <div class="table-responsive">
                <!-- Table Heading Section -->
                <div class="card mb-3 shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
    <a class="text-decoration-none" style="font-size: 14px; color: blue;">Pents Measurements</a>
</h5>

                        <a href="{{ route('pents.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Add New Pents
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-striped table-hover table-sm mb-0" style="width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">S.NO</th>
                            <th>Length</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>Created By</th>
                            <th class="pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pents as $pent)
                        <tr>
                            <td class="ps-3">{{ $loop->iteration }}</td>
                            <td>{{ $pent->pent_length }}</td>
                            <td>{{ $pent->waist }}</td>
                            <td>{{ $pent->hips }}</td>
                            <td>{{ $pent->user->name }}</td>
                            <td>
                                 <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('pents.show', $pent->id) }}" class="btn btn-info btn-sm icon-btn">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                        <a href="{{ route('pents.edit', $pent->id) }}" class="btn btn-success btn-sm icon-btn">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pents.destroy', $pent->id) }}" method="POST" style="display: inline;">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm icon-btn">
                                          <i class="fas fa-trash"></i>
                                       </button>
                                    </form>
                                 </div>
                              </td>
                        </tr>
                        @empty
                        <!-- <tr>
                            <td colspan="6" class="text-center">No pants measurements found.</td>
                        </tr> -->
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card Footer with Pagination -->
        <div class="card-footer bg-white d-flex justify-content-center py-3">
            {{ $pents->links() }}
        </div>
    </div>
</div>

<!-- Tooltip Initialization Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<style>
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .bi {
        vertical-align: middle;
    }
    .table th, .table td {
        vertical-align: middle;
        border: 1px solid #dee2e6; /* Add border to each field */
    }
    .table-responsive {
        margin-top: 20px;
        margin-left: 20px; /* Add space on the left side to shift the table to the right */
    }
    .card-header h5 {
        font-weight: 600;
        font-size: 1.25rem;
    }
    .card-body {
        padding: 2rem;
    }
    .card-footer {
        border-top: 1px solid #ddd;
    }
    .alert-success {
        margin-bottom: 20px;
        border-radius: 0.375rem;
    }
    .card .table-responsive {
        margin-top: 15px;
    }
    .card .table th, .card .table td {
        padding: 0.75rem;
    }
</style>

@endsection
