@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="card shadow-sm w-100" style="max-width: 600px;">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
    <a  class="text-decoration-none" style="font-size: 14px; color: blue;">Edit Pents Measurements</a>
</h5>

            <button type="submit" form="pentsForm" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Update Measurement
            </button>
        </div>

        <div class="card-body">
            <form id="pentsForm" action="{{ route('pents.update', $pent->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="pent_length" class="form-label">Pent Length</label>
                        <input type="number" step="0.01" class="form-control" id="pent_length" name="pent_length" value="{{ old('pent_length', $pent->pent_length) }}" required>
                        @error('pent_length') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="waist" class="form-label">Waist</label>
                        <input type="number" step="0.01" class="form-control" id="waist" name="waist" value="{{ old('waist', $pent->waist) }}" required>
                        @error('waist') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="hips" class="form-label">Hips</label>
                        <input type="number" step="0.01" class="form-control" id="hips" name="hips" value="{{ old('hips', $pent->hips) }}" required>
                        @error('hips') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inseam" class="form-label">Inseam</label>
                        <input type="number" step="0.01" class="form-control" id="inseam" name="inseam" value="{{ old('inseam', $pent->inseam) }}" required>
                        @error('inseam') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pensa" class="form-label">Pensa</label>
                        <input type="number" step="0.01" class="form-control" id="pensa" name="pensa" value="{{ old('pensa', $pent->pensa) }}" required>
                        @error('pensa') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="pocket_type" class="form-label">Pocket Type</label>
                        <select class="form-select" id="pocket_type" name="pocket_type" required>
                            <option value="">Select Pocket Type</option>
                            <option value="Regular" {{ old('pocket_type', $pent->pocket_type) == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="Western" {{ old('pocket_type', $pent->pocket_type) == 'Western' ? 'selected' : '' }}>Western</option>
                            <option value="Cargo" {{ old('pocket_type', $pent->pocket_type) == 'Cargo' ? 'selected' : '' }}>Cargo</option>
                            <option value="No Pocket" {{ old('pocket_type', $pent->pocket_type) == 'No Pocket' ? 'selected' : '' }}>No Pocket</option>
                        </select>
                        @error('pocket_type') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>

               
            </form>
        </div>
    </div>
</div>
@endsection
