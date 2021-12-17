@extends('layouts.app')
@section('content')	
    <main id="main">
        <section class="Anderson-Lane px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="Anderson-Lane-txt">
                            <h2>My Profile</h2>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <span id="successStatusMsg" style="text-align: center;">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    {!! Session::get('fail')->first('name', '<div class="error-block">:message</div>') !!}
                    {!! Session::get('fail')->first('phone', '<div class="error-block">:message</div>') !!}
                    {!! Session::get('fail')->first('oldpass', '<div class="error-block">:message</div>') !!}
                    {!! Session::get('fail')->first('newpass', '<div class="error-block">:message</div>') !!}
                    {!! Session::get('fail')->first('cnewpass', '<div class="error-block">:message</div>') !!}
                </div>
            @endif

             @if(Session::has('faill'))
                <div class="alert alert-danger">
                    {{Session::get('faill')}}
                </div>
            @endif
        </span>

        <section class="table table-open-permits6 px-5">
            <div class="container-fluid">
                <h3>Account Info</h3>
                <form action="{{ url('/dashboard/account') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$data[0]->name}}">
                                <span id="errorMSG1"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{$data[0]->email}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control nuFldEnaClas" name="phone" maxlength="10" value="{{ $data[0]->phone}}">
                                <span class="errorMSG"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="blue-bg-btn"><button class="btn btnn-effect" style="background: #5AB9E3!important;color:#fff;" id="saveActInfo" type="submit">Save Info</button></div>
                            </div>
                            <span id="span"></span>
                        </div>

                    </div>
                </form>
            </div>

           <!--  <div class="container-fluid">
                <h3>Change Password</h3>
                <form action="{{ url('/dashboard/account/update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="oldpass">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="newpass">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="cnewpass">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-effect">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div> -->
        </section>
    </main>

@endsection