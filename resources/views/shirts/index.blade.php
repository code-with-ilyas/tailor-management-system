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
                <div class="card mb-3 shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
    <a class="text-decoration-none" style="font-size: 14px; color: blue;">shirts Measurements</a>
</h5>

                        <a href="{{ route('shirts.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Add New Shirt
                        </a>
                    </div>
                </div>

                <table class="table table-striped table-hover table-sm mb-0" style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
                    <thead class="table-light">
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px;">S.No</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Length</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Shoulder</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Sleeve</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Chest</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Collar</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Collar Type</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Waist</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Created By</th>
                            <th style="border: 1px solid #ddd; padding: 6px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shirts as $shirt)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $loop->iteration }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->length }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->shoulder }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->sleeve }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->chest }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->collar }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ ucfirst($shirt->collar_type) }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->waist }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">{{ $shirt->user->name }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px;">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('shirts.show', $shirt->id) }}" class="btn btn-outline-info px-2 py-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('shirts.edit', $shirt->id) }}" class="btn btn-outline-success px-2 py-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('shirts.destroy', $shirt->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger px-2 py-1" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-muted" style="border: 1px solid #ddd; padding: 6px;">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $shirts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
