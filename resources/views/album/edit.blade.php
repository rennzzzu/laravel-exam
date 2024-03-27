@extends('layout')


@section('content')

<section class="vh-100" style="background-color: #3da2c3;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <div class="card-body p-4">
  
                <form action="/album/{{$album->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-3">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$album->name}}">
                    </div>
                    @error('name')
                        <p class="text-danger">Required</p>
                    @enderror
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="Year" name="year" value="{{$album->year}}">
                    </div>
                    @error('year')
                        <p class="text-danger">Required</p>
                    @enderror
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="Sales" name="sales" value="{{$album->sales}}">
                    </div>
                    @error('sales')
                        <p class="text-danger">Required</p>
                    @enderror
                      <div class="col-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      
                    </div>
                </form>
                
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
