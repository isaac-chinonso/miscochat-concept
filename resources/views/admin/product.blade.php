@extends('layout.adminapp')
@section('title')
Product || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Advert Products</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Advert</li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div align="right">
                    <button class="btn btn-sm btn-info"><a href="{{ url('/admin/add-product') }}" class="text-white">Upload New Product</a></button>
                </div>

            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Product</th>
                                            <th>Username</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>location</th>
                                            <th>phone</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        @foreach($products as $prod)
                                        <tr>
                                            <td>
                                                <h6>{{ $number }}</h6>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-25 h-60 w-60 rounded text-center b-1">
                                                        <img src="../product/{{ $prod->image }}" class="align-self-center" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $prod->user->username }} </td>
                                            <td>{{ $prod->category->name }}</td>
                                            <td>{{ $prod->name }}</td>
                                            <td>
                                                <h6>{{ $prod->brand }}
                                            </td>
                                            <td>{{ $prod->location }} </td>
                                            <td>{{ $prod->phone }}</td>
                                            <td>₦{{ number_format($prod->price, 0, '.', ', ') }}</td>
                                            <td>{{ $prod->description }} </td>
                                            <td>
                                                @if($prod->status == 1)
                                                <span class="badge bg-success">Active</span>
                                                @elseif($prod->status == 0)
                                                <span class="badge bg-danger">Disabled</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#modal-default{{ $prod->id }}"><i class="fa fa-trash text-danger"></i></a>
                                                <!-- modal Area -->
                                                <div class="modal fade" id="modal-default{{ $prod->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Product</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4><strong>Confirm Deletion</strong></h4>
                                                                <p>Are you sure you want to Delete {{ $prod->name }}</p>
                                                                <img src="../product/{{ $prod->image }}" width="150px" height="100px" alt="product">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <a href="{{ route('deleteadminproduct',$prod->id) }}" class="btn btn-primary float-right">Delete Product</a>
                                                            </div>
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