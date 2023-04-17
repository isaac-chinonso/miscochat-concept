@extends('layout.adminapp')
@section('title')
Notice Board || Miscochat Concept
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Notice Board</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Notice</li>
                                <li class="breadcrumb-item active" aria-current="page">Announcement</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div align="right">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter">Add New Notice</button>
                </div>
                <!-- modal content -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add New Notice</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form method="POST" action="{{ url('admin/save-notice-board') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Title:</label>
                                        <input type="text" class="form-control" name="title" value="{{ Request::old('title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Announcement:</label>
                                        <textarea class="form-control" name="notice_text">{{ Request::old('notice_text')}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Add Announcement</button>
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
                            <div class="connectedSortable">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Public Announcement</h4>

                                        <ul class="box-controls pull-right">
                                            <li><a class="box-btn-close" href="#"></a></li>
                                            <li><a class="box-btn-slide" href="#"></a></li>
                                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="box-body p-10">
                                        <ul class="todo-list">
                                            @foreach($noticeboard as $notice)
                                            <li class="bg-light p-0 mb-15">
                                                <div class="position-relative p-20">
                                                    <!-- drag handle -->
                                                    <div class="handle handle2"></div>
                                                    <!-- todo text -->
                                                    <span class="text-line font-size-18 ml-10">{{ $notice->title }}</span>
                                                    <!-- General tools such as edit or delete-->
                                                    <div class="pull-right d-block text-dark flexbox">
                                                        <a href="#" data-toggle="tooltip" data-container="body" title="" data-original-title="Edit"><i class="fa fa-edit" data-toggle="modal" data-target="#edit{{ $notice->id }}"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete"><i class="fa fa-trash text-danger" data-toggle="modal" data-target="#delete{{ $notice->id }}"></i></a>
                                                    </div>
                                                    <div class="mt-5 ml-10">{{ $notice->notice_text }}</div>
                                                    <div class="mt-5 ml-10"><em>{{ $notice->created_at->format('d M Y ') }}</em></div>
                                                </div>
                                            </li>
                                            <!-- Edit modal content -->
                                            <div class="modal fade" id="edit{{ $notice->id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Notice</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form method="POST" action="{{ route('adminupdatenoticeboard', $notice->id) }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label">Title:</label>
                                                                    <input type="text" class="form-control" name="title" value="{{ $notice->title }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Announcement:</label>
                                                                    <textarea class="form-control" name="notice_text">{{ $notice->notice_text }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default btn-sm waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Update Announcement</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
                                            <!-- Delete modal Area -->
                                            <div class="modal fade" id="delete{{ $notice->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Notice</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4><strong>Confirm Deletion</strong></h4>
                                                            <p>Are you sure you want to Delete {{ $notice->title }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('admindeletenoticeboard',$notice->id) }}" class="btn btn-danger float-right">Delete Notice</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
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