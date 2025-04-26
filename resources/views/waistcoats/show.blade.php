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
                                <i class="fas fa-vest" style="margin-right: 10px; font-size: 1.5rem; color: #4e73df;"></i>
                                <h2 class="text-left" style="margin: 0; font-size: 1.5rem; font-weight: 600; color: #4e73df;">Waistcoat #{{ $waistcoat->id }} Details</h2>
                            </div>
                            <a class="btn btn-primary btn-default btn-squared px-30" href="{{ route('waistcoats.index') }}">Back To Index</a>
                        </div>
                    </div>

                    <!-- Waistcoat Measurement Table -->
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
                                <td>Length</td>
                                <td>{{ $waistcoat->length }} cm</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Waist</td>
                                <td>{{ $waistcoat->waist }} cm</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Chest</td>
                                <td>{{ $waistcoat->chest }} cm</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Shoulder</td>
                                <td>{{ $waistcoat->shoulder }} cm</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Pocket Type</td>
                                <td>{{ $waistcoat->pocket_type }}</td>
                            </tr>
                        </tbody>
                    </table>

</div>
@endsection