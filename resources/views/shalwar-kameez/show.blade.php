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
                                <h2 class="text-left" style="margin: 0; font-size: 1.5rem; font-weight: 600; color: #4e73df;">Shalwar Kameez #{{ $shalwarKameez->id }} Details</h2>
                            </div>
                            <a class="btn btn-primary btn-default btn-squared px-30" href="{{ route('shalwar-kameez.index') }}">Back To Index</a>
                        </div>
                    </div>

                    <!-- Shalwar Kameez Measurement Table -->
                    <div class="row">
                        <div class="col-md-6">
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
                                        <td>{{ $shalwarKameez->length }}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Collar</td>
                                        <td>{{ $shalwarKameez->collar }}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Shoulder</td>
                                        <td>{{ $shalwarKameez->shoulder }}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Back Type</td>
                                        <td>{{ ucfirst($shalwarKameez->back_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Back</td>
                                        <td>{{ $shalwarKameez->back }}</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Cuff Type</td>
                                        <td>{{ ucfirst($shalwarKameez->cuff_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Pensa</td>
                                        <td>{{ $shalwarKameez->pensa }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
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
                                        <td>8</td>
                                        <td>Sleeves</td>
                                        <td>{{ $shalwarKameez->sleeves }}</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Chest</td>
                                        <td>{{ $shalwarKameez->chest }}</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Bottom Collar Type</td>
                                        <td>{{ ucfirst($shalwarKameez->bottom_collar_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Shalwar Type</td>
                                        <td>{{ ucfirst($shalwarKameez->shalwar_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Pocket Type</td>
                                        <td>{{ ucfirst($shalwarKameez->pocket_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Bottom Type</td>
                                        <td>{{ ucfirst($shalwarKameez->bottom_type) }}</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Bottom</td>
                                        <td>{{ $shalwarKameez->bottom }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
