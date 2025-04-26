@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="card shadow-sm w-100" style="max-width: 600px;">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <!-- <a href="{{ route('waistcoats.index') }}" class="text-decoration-none text-dark"> -->
                    Edit Waistcoat Measurement
                </a>
            </h5>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="waistcoatForm" action="{{ route('waistcoats.update', $waistcoat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="length" class="form-label">Length</label>
                        <input type="number" class="form-control @error('length') is-invalid @enderror" id="length" name="length"
                            value="{{ old('length', $waistcoat->length) }}" placeholder="Enter length" required>
                        @error('length')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="waist" class="form-label">Waist</label>
                        <input type="number" class="form-control @error('waist') is-invalid @enderror" id="waist" name="waist"
                            value="{{ old('waist', $waistcoat->waist) }}" placeholder="Enter waist" required>
                        @error('waist')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="chest" class="form-label">Chest</label>
                        <input type="number" class="form-control @error('chest') is-invalid @enderror" id="chest" name="chest"
                            value="{{ old('chest', $waistcoat->chest) }}" placeholder="Enter chest" required>
                        @error('chest')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="shoulder" class="form-label">Shoulder</label>
                        <input type="number" class="form-control @error('shoulder') is-invalid @enderror" id="shoulder" name="shoulder"
                            value="{{ old('shoulder', $waistcoat->shoulder) }}" placeholder="Enter shoulder" required>
                        @error('shoulder')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pocket_type" class="form-label">Pocket Type</label>
                        <select class="form-select @error('pocket_type') is-invalid @enderror" id="pocket_type" name="pocket_type" required>
                            <option value="">Select Pocket Type</option>
                            <option value="Regular" {{ old('pocket_type', $waistcoat->pocket_type) == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Western" {{ old('pocket_type', $waistcoat->pocket_type) == 'Western' ? 'selected' : '' }}>Western</option>
                            <option value="No Pocket" {{ old('pocket_type', $waistcoat->pocket_type) == 'No Pocket' ? 'selected' : '' }}>No Pocket</option>
                        </select>
                        @error('pocket_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('waistcoats.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="bi bi-check-circle"></i> Update Waistcoat Measurement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection