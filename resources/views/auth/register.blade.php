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
	            <h1 class="fs-2 mt-4">Signup for an account!</h1>
	            <p class="lead mb-4">Fill in the form below to register your account</p>
	        </div>
            <!-- Form START -->
            <form method="post" action="{{ route('register') }}">
            	@csrf

                <div class="mb-4">
                    <label for="user_name" class="form-label">Your full name</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person"></i></span>
                        <input name="name" type="name" class="form-control border-0 bg-light rounded-end ps-1" placeholder="John Doe" id="user_name">
                    </div>
                    @include('common.form-feedback', ['name' => 'name'])
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="user_email" class="form-label">Email address</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                        <input name="email" type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="user_email">
                    </div>

                    @include('common.form-feedback', ['name' => 'email'])
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                        	<i class="bi bi-lock"></i>
                        </span>
                        <input name="password" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Password" id="user_password">
                    </div>
                    @include('common.form-feedback', ['name' => 'password'])
                </div>

                <div class="mb-4">
                    <label for="user_confirm_password" class="form-label">Confirm Password</label>
                    <div class="input-group input-group-lg border">
                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input name="password_confirmation" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Confirm password" id="user_confirm_password">
                    </div>
                </div>

                <!-- Button -->
                <div class="align-items-center mt-0">
                    <div class="d-grid">
                        <button class="btn btn-primary mb-0" type="submit">Register</button>
                    </div>
                </div>
            </form>
            <!-- Form END -->

            <!-- Sign up link -->
            <div class="mt-4 text-center mb-5">
                <span>Already have an account? <a href="{{ route('login') }}">Login here</a></span>
            </div>
        </div>
    </div> <!-- Row END -->
</div>
@endsection
