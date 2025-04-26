@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="card shadow-sm w-100" style="max-width: 600px;">
        
        <!-- Title and Button Section -->
        <div class="px-4 pt-4 d-flex justify-content-between align-items-center">
             <h1 class="mb-0 fs-5">
                <a href="{{ route('shirts.index') }}" class="text-decoration-none text-dark">Show shirts Measurement</a>
            </h1>
            <button type="submit" form="shirtsForm" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add
            </button>
        </div>

        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" id="shirtsForm" action="{{ route('shirts.store') }}">
                @csrf

                <div class="form-group">
                    <label for="user_id" class="col-form-label text-md-right">User</label>
                    <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="length" class="col-form-label">Length (in inches)</label>
                        <input id="length" type="number" step="0.01" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ old('length') }}" required>
                        @error('length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="shoulder" class="col-form-label">Shoulder (in inches)</label>
                        <input id="shoulder" type="number" step="0.01" class="form-control @error('shoulder') is-invalid @enderror" name="shoulder" value="{{ old('shoulder') }}" required>
                        @error('shoulder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="sleeve" class="col-form-label">Sleeve (in inches)</label>
                        <input id="sleeve" type="number" step="0.01" class="form-control @error('sleeve') is-invalid @enderror" name="sleeve" value="{{ old('sleeve') }}" required>
                        @error('sleeve')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="chest" class="col-form-label">Chest (in inches)</label>
                        <input id="chest" type="number" step="0.01" class="form-control @error('chest') is-invalid @enderror" name="chest" value="{{ old('chest') }}" required>
                        @error('chest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="collar" class="col-form-label">Collar (in inches)</label>
                        <input id="collar" type="number" step="0.01" class="form-control @error('collar') is-invalid @enderror" name="collar" value="{{ old('collar') }}" required>
                        @error('collar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="waist" class="col-form-label">Waist (in inches)</label>
                        <input id="waist" type="number" step="0.01" class="form-control @error('waist') is-invalid @enderror" name="waist" value="{{ old('waist') }}" required>
                        @error('waist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <div class="col-md-6">
                        <label for="collar_type" class="col-form-label">Collar Type</label>
                        <select id="collar_type" class="form-control @error('collar_type') is-invalid @enderror" name="collar_type" required>
                            <option value="">Select Collar Type</option>
                            <option value="regular" {{ old('collar_type') == 'regular' ? 'selected' : '' }}>Regular</option>
                            <option value="button-down" {{ old('collar_type') == 'button-down' ? 'selected' : '' }}>Button Down</option>
                            <option value="spread" {{ old('collar_type') == 'spread' ? 'selected' : '' }}>Spread</option>
                            <option value="wingtip" {{ old('collar_type') == 'wingtip' ? 'selected' : '' }}>Wingtip</option>
                            <option value="mandarin" {{ old('collar_type') == 'mandarin' ? 'selected' : '' }}>Mandarin</option>
                        </select>
                        @error('collar_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
