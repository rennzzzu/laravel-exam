@extends('layout')


@section('content')

<section class="vh-100" style="background-color: #3da2c3;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <div class="card-body p-4">
                <h2 class="text-center">Login</h2>
                <form action="/users/authenticate" method="POST">
                    @csrf
                  
                    <div class="form-group">
                      <label for="Username">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{old('username')}}">
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{old('password')}}"> 
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
