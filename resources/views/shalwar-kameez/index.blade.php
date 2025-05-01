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
                        <h6 class="mb-0 fw-semibold text-primary" style="font-size: 14px;">Shalwar Kameez Measurements</h6>
                        <a href="{{ route('shalwar-kameez.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Add New Measurement
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table table-striped table-hover table-sm mb-0" style="width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">S.NO</th>
                            <th>Length</th>
                            <th>Collar</th>
                            <th>Shoulder</th>
                            <th>Back Type</th>
                            <th>Back</th>
                            <th>Cuff Type</th>
                            <th>Sleeves</th>
                            <th>Chest</th>
                            <th>Bottom Collar Type</th>
                            <th>Shalwar Type</th>
                            <th>Pensa</th>
                            <th>Pocket Type</th>
                            <th>Bottom Type</th>
                            <th>Bottom</th>
                            <th>Created By</th>
                            <th class="pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($measurements as $measurement)
                        <tr>
                            <td class="ps-3">{{ ($measurements->currentPage() - 1) * $measurements->perPage() + $loop->iteration }}</td>
                            <td>{{ $measurement->length }}</td>
                            <td>{{ $measurement->collar }}</td>
                            <td>{{ $measurement->shoulder }}</td>
                            <td>{{ $measurement->back_type }}</td>
                            <td>{{ $measurement->back }}</td>
                            <td>{{ $measurement->cuff_type }}</td>
                            <td>{{ $measurement->sleeves }}</td>
                            <td>{{ $measurement->chest }}</td>
                            <td>{{ $measurement->bottom_collar_type }}</td>
                            <td>{{ $measurement->shalwar_type }}</td>
                            <td>{{ $measurement->pensa }}</td>
                            <td>{{ $measurement->pocket_type }}</td>
                            <td>{{ $measurement->bottom_type }}</td>
                            <td>{{ $measurement->bottom }}</td>
                            <td>{{ $measurement->user->name }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('shalwar-kameez.show', $measurement->id) }}" class="btn btn-info btn-sm icon-btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('shalwar-kameez.edit', $measurement->id) }}" class="btn btn-success btn-sm icon-btn">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('shalwar-kameez.destroy', $measurement->id) }}" method="POST" style="display: inline;">
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
                        <!-- Optional: Message when no measurements -->
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $measurements->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Tooltip Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<!-- Styles -->
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
        border: 1px solid #dee2e6;
    }
    .table-responsive {
        margin-top: 20px;
        margin-left: 20px;
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
