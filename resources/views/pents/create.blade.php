@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="card shadow-sm w-100" style="max-width: 600px;">

        <!-- Card Header with Title and Button -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <a href="{{ route('pents.index') }}" class="text-decoration-none text-dark">
                    Show Pents Measurement
                </a>
            </h5>
           
            <button type="submit" form="pentsForm" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Measurement
            </button>
        </div>

        <div class="card-body">
            <form id="pentsForm" action="{{ route('pents.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="pent_length" class="form-label">Pants Length</label>
                        <input type="text" class="form-control" id="pent_length" name="pent_length"
                            value="{{ old('pent_length') }}" placeholder="Enter length" required>
                        @error('pent_length')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="waist" class="form-label">Waist</label>
                        <input type="text" class="form-control" id="waist" name="waist"
                            value="{{ old('waist') }}" placeholder="Enter waist" required>
                        @error('waist')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="hips" class="form-label">Hips</label>
                        <input type="text" class="form-control" id="hips" name="hips"
                            value="{{ old('hips') }}" placeholder="Enter hips" required>
                        @error('hips')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inseam" class="form-label">Inseam</label>
                        <input type="text" class="form-control" id="inseam" name="inseam"
                            value="{{ old('inseam') }}" placeholder="Enter inseam" required>
                        @error('inseam')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pensa" class="form-label">Pensa</label>
                        <input type="text" class="form-control" id="pensa" name="pensa"
                            value="{{ old('pensa') }}" placeholder="Enter pensa" required>
                        @error('pensa')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pocket_type" class="form-label">Pocket Type</label>
                        <select class="form-select" id="pocket_type" name="pocket_type" required>
                            <option value="">Select Pocket Type</option>
                            <option value="Regular" {{ old('pocket_type') == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Western" {{ old('pocket_type') == 'Western' ? 'selected' : '' }}>Western</option>
                            <option value="Cargo" {{ old('pocket_type') == 'Cargo' ? 'selected' : '' }}>Cargo</option>
                            <option value="No Pocket" {{ old('pocket_type') == 'No Pocket' ? 'selected' : '' }}>No Pocket</option>
                        </select>
                        @error('pocket_type')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('pents.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection