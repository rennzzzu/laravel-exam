@extends('layout')


@section('content')

<section class="vh-100" style="background-color: #3da2c3;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <div class="card-body p-4">
  
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr>
                        <td>{{$artist->name}}</td>
                        <td>{{$artist->code}}</td>
                      </tr>
                     
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
