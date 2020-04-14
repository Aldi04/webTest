@extends('layouts.app') 

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Data Table</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item active">City</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h4 class="mt-0 header-title">City Data</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn btn-sm m-b-15" data-toggle="modal" data-target="#modalCreate">Add City</a>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($result['city'] as $results)
                                        <tr>
                                            <td>{{$results['id']}}</td>
                                            <td>{{$results['city_code']}}</td>
                                            <td>{{$results['city_name']}}</td>
                                            @foreach($result['province'] as $res) 
                                            @if ($results['province_id'] == $res['id'])
                                            <td>{{$res['province_name']}}</td>
                                            @endif
                                            @endforeach
                                            <td>
                                                <a href="#" action="/city/{{$results['id']}}" data-toggle="modal" data-target="#modalShow{{$results['id']}}" class="btn btn-info waves-effect waves-light btn-sm"><i class="typcn typcn-eye-outline"></i> Show</a>
                                                <a href="#" action="/editCity/" data-toggle="modal" data-target="#modalEdit{{$results['id']}}" class="btn btn-warning waves-effect waves-light btn-sm edit"><i class="typcn typcn-edit"></i> Edit</a>
                                                <a href="/deleteCity/{{$results['id']}}" onclick="return confirm('Are you sure want to DELETE {{$results['city_name']}} ?')" data-uri="" class="btn btn-primary waves-effect waves-light btn-sm"><i class="typcn typcn-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end page content-->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->

    <footer class="footer">
        © 2018 Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
    </footer>

</div>

<!-- Modal Insert -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/insertCity" class="needs-validation" onsubmit="return confirm('are you sure want Add City ?')">
                @csrf
                <div class="modal-body">
                    <label>City code :</label>
                    <input type="number" class="form-control" name="city_code" required="" placeholder="0">
                </div>
                <div class="modal-body">
                    <label>City name :</label>
                    <input type="text" class="form-control" name="city_name" required="" placeholder="City name">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <select class="form-control selectric" name="province_id" required>
                        <option value="">&mdash;</option>
                        @foreach($result['province'] as $results)
                        <option value="{{ $results['id'] }}">{{ $results['province_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Show -->
@foreach($result['city'] as $results)
<div class="modal fade" id="modalShow{{$results['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data {{$results['city_name']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{$results['id']}}" name="id">
                    <label>City code :</label>
                    <input id="currencyInputEdit" type="number" disabled class="form-control" name="city_code" value="{{$results['city_code']}}">
                </div>
                <div class="modal-body">
                    <label>City name :</label>
                    <input id="currencyInputEdit" type="text" disabled class="form-control" name="city_name" value="{{$results['city_name']}}">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <select class="form-control selectric" name="province_id" required disabled>
                        @foreach($result['province'] as $res) 
                        @if ($results['province_id'] == $res['id'])
                        <option value="{{ $res['id'] }}">{{ $res['province_name'] }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Edit -->
@foreach($result['city'] as $results)
<div class="modal fade" id="modalEdit{{$results['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST" action="/editCity/" class="needs-validation" onsubmit="return confirm('are you sure want to update province ?')">
                {{ method_field('PUT') }} @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{$results['id']}}" name="id">
                    <label>City code :</label>
                    <input id="currencyInputEdit" type="number" class="form-control" name="city_code" required="" placeholder="" value="{{$results['city_code']}}">
                </div>
                <div class="modal-body">
                    <label>City name :</label>
                    <input id="currencyInputEdit" type="text" class="form-control" name="city_name" required="" placeholder="" value="{{$results['city_name']}}">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <select class="form-control selectric" name="province_id" required>
                        @foreach($result['province'] as $res) 
                        @if ($results['province_id'] == $res['id'])
                        <option value="{{ $res['id'] }}" selected>{{ $res['province_name'] }}</option>
                        @else
                        <option value="{{ $res['id'] }}">{{ $res['province_name'] }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach 

@endsection