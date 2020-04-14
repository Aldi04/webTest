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
                            <li class="breadcrumb-item active">Province</li>
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
                                        <h4 class="mt-0 header-title">Province Data</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn btn-sm m-b-15" data-toggle="modal" data-target="#modalCreate">Add Province</a>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($result['province'] as $results)
                                        <tr>
                                            <td>{{$results['id']}}</td>
                                            <td>{{$results['province_code']}}</td>
                                            <td>{{$results['province_name']}}</td>
                                            @foreach($result['country'] as $res) 
                                            @if ($results['country_id'] == $res['id'])
                                            <td>{{$res['country_name']}}</td>
                                            @endif 
                                            @endforeach
                                            <td>
                                                <a href="#" action="/province/{{$results['id']}}" data-toggle="modal" data-target="#modalShow{{$results['id']}}" class="btn btn-info waves-effect waves-light btn-sm"><i class="typcn typcn-eye-outline"></i> Show</a>
                                                <a href="#" action="/editProvince/" data-toggle="modal" data-target="#modalEdit{{$results['id']}}" class="btn btn-warning waves-effect waves-light btn-sm edit"><i class="typcn typcn-edit"></i> Edit</a>
                                                <a href="/deleteProvince/{{$results['id']}}" onclick="return confirm('Are you sure want to DELETE {{$results['province_name']}} ?')" data-uri="" class="btn btn-primary waves-effect waves-light btn-sm"><i class="typcn typcn-trash"></i> Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Province</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/insertProvince" class="needs-validation" onsubmit="return confirm('are you sure want Add Province ?')">
                @csrf
                <div class="modal-body">
                    <label>Province code :</label>
                    <input type="number" class="form-control" name="province_code" required="" placeholder="0">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <input type="text" class="form-control" name="province_name" required="" placeholder="Province Name">
                </div>
                <div class="modal-body">
                    <label>Counntry name :</label>
                    <select class="form-control selectric" name="country_id" required>
                        <option value="">&mdash;</option>
                        @foreach($result['country'] as $results)
                        <option value="{{ $results['id'] }}">{{ $results['country_name'] }}</option>
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
@foreach($result['province'] as $results)
<div class="modal fade" id="modalShow{{$results['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data {{$results['province_name']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{$results['id']}}" name="id">
                    <label>Province code :</label>
                    <input id="currencyInputEdit" type="number" disabled class="form-control" name="province_code" value="{{$results['province_code']}}">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <input id="currencyInputEdit" type="text" disabled class="form-control" name="province_name" value="{{$results['province_name']}}">
                </div>
                <div class="modal-body">
                    <label>Country name :</label>
                    <select class="form-control selectric" name="country_id" required disabled>
                        @foreach($result['country'] as $res) 
                        @if ($results['country_id'] == $res['id'])
                        <option value="{{ $res['id'] }}">{{ $res['country_name'] }}</option>
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
@foreach($result['province'] as $results)
<div class="modal fade" id="modalEdit{{$results['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Province</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST" action="/editProvince/" class="needs-validation" onsubmit="return confirm('are you sure want to update province ?')">
                {{ method_field('PUT') }} @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{$results['id']}}" name="id">
                    <label>Province code :</label>
                    <input id="currencyInputEdit" type="number" class="form-control" name="province_code" required="" placeholder="" value="{{$results['province_code']}}">
                </div>
                <div class="modal-body">
                    <label>Province name :</label>
                    <input id="currencyInputEdit" type="text" class="form-control" name="province_name" required="" placeholder="" value="{{$results['province_name']}}">
                </div>
                <div class="modal-body">
                    <label>Counntry name :</label>
                    <select class="form-control selectric" name="country_id" required>
                        @foreach($result['country'] as $res) 
                        @if ($results['country_id'] == $res['id'])
                        <option value="{{ $res['id'] }}" selected>{{ $res['country_name'] }}</option>
                        @else
                        <option value="{{ $res['id'] }}">{{ $res['country_name'] }}</option>
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