@extends('layout.adminapp')
@section('title')
Topup Plan || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Top up Plan</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Mobile Topup</li>
                                <li class="breadcrumb-item active" aria-current="page">Plan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div align="right">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter">Create New Plan</button>
                </div>
                <!-- modal content -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Create New Mobile Topup Plan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form method="POST" action="{{ url('admin/save-mobile-topup-plan') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Network Type:</label>
                                        <select class="form-control" name="network">
                                            <option selected disabled>Select Network</option>
                                            <option value="1">MTN</option>
                                            <option value="2">GLO</option>
                                            <option value="3">9MOBILE</option>
                                            <option value="4">AIRTEL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Topup Unit:</label>
                                        <input type="text" class="form-control" name="unit" placeholder="1gb" value="{{ Request::old('unit')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price:</label>
                                        <input type="text" class="form-control" name="price" placeholder="250" value="{{ Request::old('price')}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Add Topup Plan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @include('include.success')
                    @include('include.warning')
                    @include('include.error')
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Network</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($topupplan as $plan)
                                        <tr>
                                            <td>
                                                <h6>{{ $number }}</h6>
                                            </td>

                                            <td>
                                                @if($plan->network == 1)
                                                MTN
                                                @elseif($plan->network == 2)
                                                GLO
                                                @elseif($plan->network == 4)
                                                9MOBILE
                                                @elseif($plan->network == 3)
                                                AIRTEL
                                                @endif
                                            </td>
                                            <td>{{ $plan->unit }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit{{ $plan->id }}"> Edit Plan </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{ $plan->id }}"> Delete </button>
                                                <!-- modal Area -->
                                                <div class="modal fade" id="modal-default{{ $plan->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Mobile Topup Plan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4><strong>Confirm Deletion</strong></h4>
                                                                <p>Are you sure you want to Delete <strong> {{ $plan->network }} {{ $plan->unit }} </strong></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <a href="{{ route('deletetopupplan',$plan->id) }}" class="btn btn-primary float-right">Delete Topup Plan</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                <!-- modal Area -->
                                                <div class="modal fade" id="modal-edit{{ $plan->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Mobile Topup Plan </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form method="post" action="{{ route('updatetopupplan',$plan->id) }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Network Type:</label>
                                                                        <select class="form-control" name="network">
                                                                            <option value="{{ $plan->network }}" selected>{{ $plan->network }}</option>
                                                                            <option disabled>Select Another Network</option>
                                                                            <option value="1">MTN</option>
                                                                            <option value="2">GLO</option>
                                                                            <option value="3">9MOBILE</option>
                                                                            <option value="4">AIRTEL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Topup Unit:</label>
                                                                        <input type="text" class="form-control" name="unit" placeholder="1gb" value="{{ $plan->unit }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Price:</label>
                                                                        <input type="text" class="form-control" name="price" placeholder="250" value="{{ $plan->price }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-primary float-right" type="submit">Update Topup Plan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                        <?php $number++; ?>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection