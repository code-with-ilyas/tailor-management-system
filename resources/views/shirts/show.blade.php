@extends('layouts.master')

@section('content')
<div class="contents">

    <div class="demo3 mb-25 t-thead-bg">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
            <div class="overview-content w-100">
                    
                    <!-- Card Header with Title -->
                    <div class="card-header" style="padding: 15px 20px; background-color: #f8f9fa; border-bottom: 1px solid #e3e6f0;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="display: flex; align-items: center;">
                                <i class="fas fa-trousers" style="margin-right: 10px; font-size: 1.5rem; color: #4e73df;"></i>
                                <h2 class="text-left" style="margin: 0; font-size: 1.5rem; font-weight: 600; color: #4e73df;">Shirt #{{ $shirt->id }} Details</h2>
                            </div>
                            <a class="btn btn-primary btn-default btn-squared px-30" href="{{ route('pents.index') }}">Back To Index</a>
                        </div>
                    </div>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 40%;">Length</th>
                            <td>{{ $shirt->length }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Shoulder</th>
                            <td>{{ $shirt->shoulder }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sleeve</th>
                            <td>{{ $shirt->sleeve }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Chest</th>
                            <td>{{ $shirt->chest }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Collar</th>
                            <td>{{ $shirt->collar }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Collar Type</th>
                            <td>{{ ucfirst($shirt->collar_type) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Waist</th>
                            <td>{{ $shirt->waist }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Created By</th>
                            <td>{{ $shirt->user->name }}</td>
                        </tr>
                    </tbody>
                </table>

               
            </div>
        </div>
    </div>
</div>
@endsection
