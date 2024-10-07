@extends('web.layout.master')
@section('content')
<div class="col-12 col-lg-6 mx-auto mt-5">
    <div class="row mt-5">
        <div class="col-sm-10 col-xl-8 m-auto">
            <!-- Title -->
            <div class="mb-0 fs-1 text-center">
                <a href="/">
	               <img src="{{ asset('images/logo.png') }}" class="" width="60" height="60">
                </a>
	            <h1 class="fs-2 mt-4">Login into Intact!</h1>
	            <p class="lead mb-4">Nice to see you! Please log in with your account.</p>
	        </div>
            <!-- Form START -->
            <form method="post" action="{{ route('login') }}">
            	@csrf
                <!-- Email -->
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Email address *</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                        <input name="email" type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1">
                    </div>
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="inputPassword5" class="form-label">Password *</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                        	<i class="bi bi-lock"></i>
                        </span>
                        <input name="password" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5">
                    </div>
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8 characters at least
                    </div>
                </div>
                <!-- Check box -->
                <div class="mb-4 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <div class="text-primary-hover">
                        <a href="forgot-password.html" class="text-secondary">
                            <u>Forgot password?</u>
                        </a>
                    </div>
                </div>
                <!-- Button -->
                <div class="align-items-center mt-0">
                    <div class="d-grid">
                        <button class="btn btn-primary mb-0" type="submit">Login</button>
                    </div>
                </div>
            </form>
            <!-- Form END -->

            <!-- Sign up link -->
            <div class="mt-4 text-center mb-5">
                <span>Already have an account? <a href="{{ route('register') }}">Signup here</a></span>
            </div>
        </div>
    </div> <!-- Row END -->
</div>
@endsection
