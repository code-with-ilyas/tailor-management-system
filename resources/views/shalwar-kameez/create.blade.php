@extends('layouts.master')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <style>
    .measurement-form { border: 1px solid #dee2e6; padding: 15px; border-radius: 4px; }
    .measurement-form h5 { margin-top: 1rem; font-weight: 600; color: #007bff; font-size: 16px; }
    .measurement-form .form-group { margin-bottom: 0.5rem; }
    </style>

    <div class="card">
        <div class="card-header">
            <h4>Shalwar Kameez Measurements</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('shalwar-kameez.store') }}" class="measurement-form w-75 mx-auto">
                @csrf
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('shalwar-kameez.index') }}" class="text-primary text-decoration-none" style="font-size: 14px;">Show Shalwar Kameez</a>
                    <button type="submit" class="btn btn-primary">Save Shalwar Kameez</button>
                </div>

                <!-- Shalwar Measurements -->
                <h5>kameez Measurements</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="length">Length</label>
                            <input type="text" class="form-control form-control-sm" name="length" id="length" value="{{ old('length') }}">
                            @error('length') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="collar">Collar</label>
                            <select class="form-control form-control-sm" name="collar" id="collar">
    <option value="">-- Select Collar --</option>
    <option value="Simple">Simple</option>
    <option value="Band">Band</option>
    <option value="Cut">Cut</option>
</select>

                            @error('collar') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shoulder">Shoulder</label>
                            <input type="text" class="form-control form-control-sm" name="shoulder" id="shoulder" value="{{ old('shoulder') }}">
                            @error('shoulder') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="back_type">Back Type</label>
                            <select class="form-control form-control-sm" name="back_type" id="back_type">
                                <option value="">-- Select Back Type --</option>
                                <option value="Simple">Simple</option>
                                <option value="Double Layer">Double Layer</option>
                            </select>
                            @error('back_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="back">Back</label>
                            <input type="text" class="form-control form-control-sm" name="back" id="back" value="{{ old('back') }}">
                            @error('back') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="cuff_type">Cuff Type</label>
                            <select class="form-control form-control-sm" name="cuff_type" id="cuff_type">
                                <option value="">-- Select Cuff Type --</option>
                                <option value="Simple">Simple</option>
                                <option value="Button">Button</option>
                                <option value="Cufflink">Cufflink</option>
                            </select>
                            @error('cuff_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <!-- Kameez Measurements -->
                <h5 class="mt-3">Shalwar Measurements</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sleeves">Sleeves</label>
                            <input type="text" class="form-control form-control-sm" name="sleeves" id="sleeves" value="{{ old('sleeves') }}">
                            @error('sleeves') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="chest">Chest</label>
                            <input type="text" class="form-control form-control-sm" name="chest" id="chest" value="{{ old('chest') }}">
                            @error('chest') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bottom_collar_type">Bottom Collar Type</label>
                            <select class="form-control form-control-sm" name="bottom_collar_type" id="bottom_collar_type">
                                <option value="">-- Select Bottom Collar Type --</option>
                                <option value="Simple">Simple</option>
                                <option value="Double">Double</option>
                            </select>
                            @error('bottom_collar_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="shalwar_type">Shalwar Type</label>
                            <select class="form-control form-control-sm" name="shalwar_type" id="shalwar_type">
                                <option value="">-- Select Shalwar Type --</option>
                                <option value="Simple">Simple</option>
                                <option value="Patiala">Patiala</option>
                                <option value="Straight">Straight</option>
                            </select>
                            @error('shalwar_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pensa">Pensa</label>
                            <input type="text" class="form-control form-control-sm" name="pensa" id="pensa" value="{{ old('pensa') }}">
                            @error('pensa') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pocket_type">Pocket Type</label>
                            <select class="form-control form-control-sm" name="pocket_type" id="pocket_type">
                                <option value="">-- Select Pocket Type --</option>
                                <option value="Straight">Straight</option>
                                <option value="Rounded">Rounded</option>
                                <option value="Box">Box</option>
                            </select>
                            @error('pocket_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <!-- Bottom Section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bottom_type">Bottom Type</label>
                            <select class="form-control form-control-sm" name="bottom_type" id="bottom_type">
                                <option value="">-- Select Bottom Type --</option>
                                <option value="Simple">Simple</option>
                                <option value="Elastic">Elastic</option>
                            </select>
                            @error('bottom_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bottom">Bottom</label>
                            <input type="text" class="form-control form-control-sm" name="bottom" id="bottom" value="{{ old('bottom') }}">
                            @error('bottom') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
