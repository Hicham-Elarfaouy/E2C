@extends('layouts.home')

@section('title')
    Login
@endsection

@section('header')
    <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Formations</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contacts</a></li>
@endsection

@section('main')
    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="{{ asset('storage/img/illustrations/login.svg') }}">
                </div>
                <div class="col-md-5 col-xl-5 text-center text-md-start">
                    <x-validation-errors class="mb-4"/>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Login</strong><br></span>
                    </h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3"><x-input id="email" class="shadow form-control" type="email" name="email" :value="old('email')" required autofocus
                                                                              autocomplete="username"/></div>
                        <div class="mb-3"><x-input id="password" class="shadow form-control" type="password" name="password" required
                                                   autocomplete="current-password"/></div>
                        <div class="block my-3">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember"/>
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="mb-5">
                            <button class="btn btn-primary shadow" type="submit">Log in</button>
                        </div>
                        <p class="text-muted">@if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
