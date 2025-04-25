
@extends('layouts.master')

@section('content')
<div class="contents">

<div class="demo3 mb-25 t-thead-bg">
<div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
<div class="overview-content w-100">
    
<div class="container my-5 col-md-6 mx-auto">
    <div class="row text-primary text-center">
       
</div>
<div class="card-header" style="padding: 15px 20px; background-color: #f8f9fa; border-bottom: 1px solid #e3e6f0;">
<div style="display: flex; justify-content: space-between; align-items: center;">
<div style="display: flex; align-items: center;">
      <i class="fas fa-users" style="margin-right: 10px; font-size: 1.5rem; color: #4e73df;"></i>
      <h2 class="text-left" style="margin: 0; font-size: 1.5rem; font-weight: 600; color: #4e73df;">User Details</h2>
 </div>
        <a class="btn btn-primary btn-default btn-squared px-30" href="{{ route('users.index') }}">Back To Index</a>
    </div>
</div>
    <table class="table table-bordered table-hover table-striped">
    <thead class="thead-light">
        <tr>
            <th>S.No</th>
            <th>Fields</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Name</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Phone</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Address</td>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>City</td>
            <td>{{ $user->city }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Type</td>
            <td>{{ $user->type }}</td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
