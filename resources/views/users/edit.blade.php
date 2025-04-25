
@extends('layouts.master')

@section('content')
<div class="contents">

<div class="demo3 mb-25 t-thead-bg">
<div class="container-fluid">
    <div class="social-dash-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif

                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-header">
                            <span class="d-block" style="margin: 5px 0 0; font-size: 14px;">
                                    <a href="{{ route('users.index') }}">All Users</a>
                                </span>
                                <div style="display: flex; align-items: center;">
                                    
                                    <h2 class="text-left" style="margin: 0;">Edit User</h2>
                                </div>
                               
                            </div>
                            <div class="card-body py-md-30">
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
                                            @error('city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label for="type">Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Type</option>
                                                <option value="1" {{ old('type', $user->type) == '1' ? 'selected' : '' }}>Admin</option>
                                                <option value="2" {{ old('type', $user->type) == '2' ? 'selected' : '' }}>Customer</option>
                                            </select>
                                            @error('type')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="layout-button mt-0">
                                                <button type="submit" class="btn btn-primary">Update User</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>
@endsection

