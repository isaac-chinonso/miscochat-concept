@extends('layout.userapp1')
@section('title')
Task || Miscochat Concept
@endsection
@section('content')

<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <h3 class="account-title">Perform Social Task and Earn </h3>
                    <p style="font-size: 14px;">You can earn constantly daily income by posting advert of various businesses and top brand on your social media accounts. To get started, simply click on any of the earning options shown below</p><br>
                </div>
            </div>
        </div>
</section>

<section class="inner-section wallet-part">
    <div class="container">
        <div class="account-card"><br>
            <div class="account-content">
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
                    <div class="col">
                        <h4>To Complete this task, kindly follow instructions below and upload information to the designated social media</h4>
                        <hr><br>
                        &nbsp;<strong>Platform:</strong> &nbsp; &nbsp;&nbsp; {{ $tasksperform->order->platform }} <br><br>
                        &nbsp;<strong>Amount to Earn:</strong> &nbsp; &nbsp;&nbsp; {{ $tasksperform->order->package - 50 }} <br><br>
                        &nbsp;<strong>Caption:</strong> &nbsp; &nbsp;&nbsp; {{ $tasksperform->order->caption }} <br><br>
                        &nbsp;<strong>Image:</strong> &nbsp; &nbsp;&nbsp; <img src="../../advert/{{ $tasksperform->order->image }}" width="100px" height="100px"> <br><br>
                    </div>
                    <hr>
                    <div class="col">
                        <h5>If Completed Kindly use the button below to up Proof(Screenshot)</h5><br>
                        <form method="post" action="{{ route('submittask',$tasksperform->id) }}" enctype="multipart/form-data">
                            @csrf
                            <label>Screenshot of Task</label>
                            <input type="hidden" name="order_id" value="{{ $tasksperform->order_id }}">
                            <input type="file" name="image" class="form-control"><br>
                            <button class="btn btn-inline" type="submit">Upload Completion Proof</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<hr>
@endsection