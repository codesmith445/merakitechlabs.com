@extends('adminlogin-layouts.adminlogin-layout')
@section('content')
<body class="az-body">

  <div class="az-signin-wrapper">
    <div class="az-card-signin">
      <h1 class="az-logo text-dark">MerakitechLabs</h1>
      <div class="az-signin-header">
        <h2 style="color: #333;">Welcome back!</h2>
        <h4>Please sign in to continue</h4>

        <form action="{{route('admin.loginAttempt')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Enter your email">
          </div><!-- form-group -->
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
          </div><!-- form-group -->
          <button class="btn btn-az-primary btn-block">Sign In</button>
        </form>
      </div><!-- az-signin-header -->
      <div class="az-signin-footer">
        <!-- <p><a href="">Forgot password?</a></p> -->
        <!-- <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p> -->
      </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
  </div><!-- az-signin-wrapper -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/ionicons/ionicons.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>

  <script src="../js/azia.js"></script>
  <script>
    $(function(){
      'use strict'

    });
  </script>
</body>
@endsection