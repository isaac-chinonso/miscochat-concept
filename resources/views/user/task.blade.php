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
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-danger">To Complete this task, kindly follow instructions below and upload information to the designated social media</h4>
                        <hr><br>
                        &nbsp;<strong>Platform 👇🏻:</strong> <br> &nbsp;{{ $tasksperform->order->platform }}<hr> 
                        &nbsp;<strong>Amount to Earn 👇🏻:</strong><br> &nbsp;₦{{ $tasksperform->order->userearn }}<hr> 
                        &nbsp;<strong>Caption 👇🏻:</strong><br> &nbsp;{{ $tasksperform->order->caption }}<hr>
                        @if($tasksperform->order->type == 'advert')
                        &nbsp;<strong>Image 👇🏻:</strong><br> &nbsp;<img src="../../advert/{{ $tasksperform->order->image }}" width="100px" height="100px"> <br><br>
                        @elseif($tasksperform->order->type == 'engagement')
                        &nbsp;<strong>Link 👇🏻:</strong><br> &nbsp;{{ $tasksperform->order->image }} <br><br>
                        @endif
                    </div>
                    <hr>
                    <div class="col">
                        <h5>If Completed Kindly use the button below to up Proof(Screenshot)</h5><br>
                        <form method="post" action="{{ route('submittask',$tasksperform->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $tasksperform->order_id }}">
                            <label>Screenshot 1</label>
                            <input type="file" name="image" class="form-control"><br>
                            <label>Screenshot 2</label>
                            <input type="file" name="image1" class="form-control"><br>
                            <label>Screenshot 3</label>
                            <input type="file" name="image2" class="form-control"><br>
                            <label>Screenshot 4</label>
                            <input type="file" name="image3" class="form-control"><br>
                            <button class="btn btn-outline"><a href="{{ route('useracceptedtask') }}">Go back</a></button>
                            <button class="btn btn-inline" type="submit">Upload Proof</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<hr>
@endsection