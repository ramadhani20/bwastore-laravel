{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.auth')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
      <a href="/index.html" class="navbar-brand">
      <img src="images/logo.svg" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="{{ route('home.index') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('category.index') }}" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Rewards</a>
        </li>
      </ul>
    </div>
    </div>
   </nav>

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login">
          <div class="col-lg-6 text-center">
            <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none">
          </div>
          <div class="col-lg-5">
            <h2>
              Belanja kebutuhan utama, <br/> menjadi lebih mudah
            </h2>
            <form method="POST" action="{{ route('login') }}" class="mt-3">
              @csrf
              <div class="form-group">
                <label>Email Address</label>
                  <x-text-input id="email" class="form-control w-75" type="email" name="email" :value="old('email')" required autofocus autocomplete="off" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="form-group">
                <label>Password</label>
                <x-text-input id="password" class="form-control w-75" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                Sign In to My Account
              </button>
              <a href="{{route('register')}}" class="btn btn-signup btn-block w-75 mt-4">
                Sign Up
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
