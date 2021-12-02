@extends('layouts.login-master')
@section('content')
    <div class="container" style="display: flex ;justify-content: center;align-items: center;height: 100vh;">
        <div class="card" style="width: 40%;">
            <div class="header">
                <p class="lead h1 font-weight-bold text-center">Login to your account</p>
            </div>
            <div class="body">
                <form class="form-auth-small user" method="POST" action="{{env('APP_URL')}}/login">
                    @csrf
                    <input type="hidden" name="url" value="{{isset($url) ? $url : ''}}">
                    <div class="form-group">
                        
                        <label for="email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{isset($email) ? $email : ''}}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password">
                    </div>
                    {{-- <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>								
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">LOGIN</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                        <span>Don't have an account? <a href="page-register.html">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
	</div>
@endsection
