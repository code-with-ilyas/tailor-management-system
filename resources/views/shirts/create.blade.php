@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="card shadow-sm w-100" style="max-width: 600px;">
        <div class="card-body">

            <!-- Title and Button Section -->
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">
    <a href="{{ route('shirts.index') }}" class="text-decoration-none" style="font-size: 14px; color: blue;">Show Shirts Measurements</a>
</h5>

                <button type="submit" form="shirtsForm" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Add Measurements
                </button>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Measurement Form -->
            <form method="POST" id="shirtsForm" action="{{ route('shirts.store') }}">
                @csrf

                <div class="form-group">
                    <label for="user_id">User</label>
                    <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="length">Length (in inches)</label>
                        <input id="length" type="number" step="0.01" name="length" class="form-control @error('length') is-invalid @enderror" value="{{ old('length') }}" required>
                        @error('length') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="shoulder">Shoulder (in inches)</label>
                        <input id="shoulder" type="number" step="0.01" name="shoulder" class="form-control @error('shoulder') is-invalid @enderror" value="{{ old('shoulder') }}" required>
                        @error('shoulder') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="sleeve">Sleeve (in inches)</label>
                        <input id="sleeve" type="number" step="0.01" name="sleeve" class="form-control @error('sleeve') is-invalid @enderror" value="{{ old('sleeve') }}" required>
                        @error('sleeve') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="chest">Chest (in inches)</label>
                        <input id="chest" type="number" step="0.01" name="chest" class="form-control @error('chest') is-invalid @enderror" value="{{ old('chest') }}" required>
                        @error('chest') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="collar">Collar (in inches)</label>
                        <input id="collar" type="number" step="0.01" name="collar" class="form-control @error('collar') is-invalid @enderror" value="{{ old('collar') }}" required>
                        @error('collar') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="waist">Waist (in inches)</label>
                        <input id="waist" type="number" step="0.01" name="waist" class="form-control @error('waist') is-invalid @enderror" value="{{ old('waist') }}" required>
                        @error('waist') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="collar_type">Collar Type</label>
                    <select id="collar_type" name="collar_type" class="form-control @error('collar_type') is-invalid @enderror" required>
                        <option value="">Select Collar Type</option>
                        <option value="regular" {{ old('collar_type') == 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="button-down" {{ old('collar_type') == 'button-down' ? 'selected' : '' }}>Button Down</option>
                        <option value="spread" {{ old('collar_type') == 'spread' ? 'selected' : '' }}>Spread</option>
                        <option value="wingtip" {{ old('collar_type') == 'wingtip' ? 'selected' : '' }}>Wingtip</option>
                        <option value="mandarin" {{ old('collar_type') == 'mandarin' ? 'selected' : '' }}>Mandarin</option>
                    </select>
                    @error('collar_type') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
