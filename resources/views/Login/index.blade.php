@extends('layouts.loginMain')

<style>
  body {
     background-image: url(http://136.198.117.7/mcsp/public/css/8.jpg);
    border-radius: 100%;
    background-image:cover;
    -o-background-size: cover;
    background-size: cover;
}
  </style>

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">

  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif

   @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismi ssible fade show" role="alert">
      {{session('loginError')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif


    <main class="form-signin">
      <h1 style="color:aliceblue" class="h3 mb-3 font-weight-normal text-center">Login Form</h1>
    <form action="{{url('/login')}}" method="post">
      @csrf
        <div class="form-floating">
        <input type="text"  name="nik"class="form-control @error('nik')is-invalid @enderror" placeholder="NIK" width="40% mb-lg-5" autofocus required>
         <label for="nik">NIK</label>
          @error('nik')
         <div class="invalid-feedback" style="color:aliceblue">
          
          {{$message}}
         </div>
        @enderror
        </div> 

        <div class="form-floating">
         <input type="password"  name="password"class="form-control" placeholder="Password" width="40% pd-4" required >
        <label for="password">Password</label>
        </div> 

        <br>
        <button type="submit" class="w-100 btn btn-lg  btn-primary">
          Login
        </button>
      </form>
      <small style="color:aliceblue" class="d-block text-center mt-4">Not registered? <a href="{{url('/register')}}">Register Now!</a></small>
       <br>
       <div class="d-flex justify-content-center">
        <a class="text-center" href="{{url('/login/reset_password')}}">Reset Password!</a>
      </div>
      </small>
    </main>
  </div>
</div>

@endsection