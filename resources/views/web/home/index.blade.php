@extends('web.layout.public')
@section('title', 'Welcome to '.config('app.name'))
@section('main')

  <!-- Jumbotron -->
    <div class="bg-info text-center bg-opacity-10 p-5">
        <h1 class="display-4">Welcome to {{ config('app.name') }}</h1>
        <p class="lead border-bottom d-inline-block mx-auto border-2 p-2">Let your app users do the talking!</p>
        <p class="w-50 mx-auto">Working on a new feature and want to beta test it? Do you want to know whether your customer like a certain feature or they want an improvement upon. Get answers to all these questions and much more in no time.</p>
        <a class="btn btn-outline-primary btn-lg" href="#features" role="button">Learn More</a>
    </div>

    <!-- Features Section -->
    <section id="features" class="py-5 bg-white">
        <div class="container py-5">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                        	<i class="bi bi-eye fs-2"></i>
                            <h5 class="card-title">In-Depth Reviews</h5>
                            <p class="card-text">Track your app user's journey and identify the pain points with ease!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                        	<i class="bi bi-chat fs-2"></i>
                            <h5 class="card-title">User Feedback</h5>
                            <p class="card-text">Get real user feedback to understand what works and what doesn’t in your app.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                        	<i class="bi bi-lightbulb fs-2"></i>
                            <h5 class="card-title">Actionable Insights</h5>
                            <p class="card-text">Receive actionable insights to improve your app and enhance user experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light border-top border-bottom">
        <div class="container pb-5">
            <h2 class="text-center mb-5 pb-3">What our users say!</h2>
            <div class="row">
                <div class="col-md-6">
                    <blockquote class="blockquote">
                        <p class="mb-3">"This service transformed our app's user experience!"</p>
                        <footer class="blockquote-footer">Amy, <cite title="Source Title">CEO of Vertafore</cite></footer>
                    </blockquote>
                </div>
                <div class="col-md-6">
                    <blockquote class="blockquote">
                        <p class="mb-3">"The feedback we received was invaluable for our app development."</p>
                        <footer class="blockquote-footer">John Smith, <cite title="Source Title">Founder of StartUp</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2>Ready to Enhance Your App?</h2>
            <p class="lead">Join us today and take your app to the next level!</p>
            <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Get Started</a>
        </div>
    </section>
@endsection