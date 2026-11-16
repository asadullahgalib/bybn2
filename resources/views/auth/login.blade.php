@extends('frontend.layouts.master')
@section('content')
<?php
    $contact = App\Model\Contact::first();
?>
<!--================= Wrapper Start Here =================-->
<div class="react-wrapper" style="margin-bottom:50px;">
    <div class="react-wrapper-inner">  
        <div class="react-login-page react-signup-page pt---120 pb---120">
            <div class="container">
                <div class="row">                            
                    <div class="col-lg-12">
                        <div class="login-right-form">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="login-top">
                                    <h3>Login</h3>
                                </div>
                                @if(Session::get('message'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        {{Session::get('message')}}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        @foreach($errors->all() as $error)
                                          <strong>{{$error}}</strong><br/>
                                        @endforeach
                                    </div>
                                @endif
                                <p>
                                    <label>Email / Mobile No <span style="color: red;">*</span> </label>
                                    <input placeholder="Your Mobile No" type="text" name="username">
                                </p>
                                <p>
                                    <label>Password <span style="color: red;">*</span> </label>
                                    <input placeholder="Enter Your Password" type="password" id="pass" name="password">
                                </p>
                                <!-- <div class="back-check-box">
                                    <input type="checkbox" id="box-1"> Remember me
                                    <p>Forget password?</p>
                                </div> -->
                                <button type="submit" id="button" name="submit">LogIn <span class="fa fa-arrow-right"></span> </button>
                                                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
<!--================= Wrapper End Here =================-->
@endsection