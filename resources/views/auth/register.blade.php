{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
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

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center row-login">
          <div class="col-lg-4">
            <h2>
             Memulai untuk jual beli <br/> dengan cara terbaru
            </h2>
            <form action="" class="mt-3">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control is-valid" v-model="name" autofocus>
              </div>            
              <div class="form-group">
                <label>Email Address</label>
                <input type="password" class="form-control is-invalid" v-model="email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Store</label>
                <p class="text-muted">
                  Apakah anda juga ingin membuka toko?
                </p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="is_store_open" id="openStoreTrue" class="custom-control-input" v-model="is_store_open" :value="true">
                  <label for="openStoreTrue" class="custom-control-label">Iya, boleh</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="is_store_open" id="openStoreFalse" class="custom-control-input" v-model="is_store_open" :value="false">
                  <label for="openStoreFalse" class="custom-control-label">Enggak, Makasih</label>
                </div>
              </div>
              <div class="form-group" v-if="is_store_open">
                <label>Nama Toko</label>
                <input type="text" class="form-control" v-model="name" autofocus>
              </div>  
              <div class="form-group" v-if="is_store_open">
                <label>Kategori</label>
                <select name="category" class="form-control">
                  <option value="">Select Category</option>
                </select> 
              </div>
              <a href="/dashboard.html" class="btn btn-success btn-block  mt-4">
                Sign Up Now
              </a>
              <a href="/login.html" class="btn btn-signup btn-block  mt-4">
                Back to Sign In
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  @push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script>
   Vue.use(Toasted);

   var register = new Vue({
     el: '#register',
     mounted() {
       AOS.init();
       this.$toasted.error(
         "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
         {
           position:"top-center",
           className: "rounded",
           duration: 1000,
         }
       );
     },
     data: {
       name: "Rizky Ramadhani",
       email: "Kamujagoan@bwa.id",
       password: "",
       is_store_open: true,
       store_name:""
     },
   });
  </script>
  @endpush