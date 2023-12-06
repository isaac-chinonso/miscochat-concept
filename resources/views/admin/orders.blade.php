@extends('layout.adminapp')
@section('title')
Orders || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Advert Orders</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Advert</li>
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
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
                                            <th>#ID</th>
                                            <th>User</th>
                                            <th>Platform</th>
                                            <th>Quantity</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Gender</th>
                                            <th>Location</th>
                                            <th>Religion</th>
                                            <th>Image</th>
                                            <th>Caption</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($orders as $ord)
                                        <tr>
                                            <td>
                                                <h6>{{ $number }}</h6>
                                            </td>

                                            <td>{{ $ord->user->username }}</td>
                                            <td>{{ $ord->platform }}</td>
                                            <td>{{ $ord->quantity }}</td>
                                            <td>{{ $ord->package }}</td>
                                            <td>₦{{ number_format($ord->amount, 0, '.', ', ') }}</td>
                                            <td>{{ $ord->gender }}</td>
                                            <td>{{ $ord->location }} </td>
                                            <td>{{ $ord->religion }}</td>
                                            <td>
                                                @if($ord->type == 'engagement')
                                                <a href="{{ $ord->image }}" target="_blank">{{ $ord->image }}</a>
                                                @elseif($ord->type == 'advert')
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-25 h-60 w-60 rounded text-center b-1">
                                                        <img src="../advert/{{ $ord->image }}" class="align-self-center" alt="">
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $ord->caption }}</td>
                                            <td>
                                                @if($ord->status == 1)
                                                <span class="badge bg-success">Approved</span>
                                                @elseif($ord->status == 0)
                                                <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#allocate{{ $ord->id }}">Approve</button><br><br>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{ $ord->id }}"> Delete </button>
                                                <!-- modal Area -->
                                                <div class="modal fade" id="modal-default{{ $ord->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Order</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4><strong>Confirm Deletion</strong></h4>
                                                                <p>Are you sure you want to Delete {{ $ord->name }}</p>
                                                                <img src="../product/{{ $ord->image }}" width="150px" height="100px" alt="product">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <a href="{{ route('deleteadminproduct',$ord->id) }}" class="btn btn-primary float-right">Delete Product</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                <!-- modal Area -->
                                                <div class="modal fade" id="allocate{{ $ord->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Approve Order</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form method="post" action="{{ route('savetask',$ord->id) }}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <h4><strong>Confirm Approval</strong></h4>
                                                                    <p>Are you sure you want to approve <strong>{{ $ord->platform }}</strong> Order from <strong>{{ $ord->user->username }}</strong> ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-primary float-right" type="submit">Approve</button>
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