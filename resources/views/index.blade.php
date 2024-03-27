@extends('layout')


@section('content')
   
   

    <section  style="background-color: #3da2c3;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body p-4">
      

                    @auth
                        <h2 class="text-center text-uppercase">Welcome {{auth()->user()->username}}</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                      @else 
                      <div class="row">
                        <div class="col-md-3">
                          <a href="/artist" class="nav-link"><button type="button" class="btn btn-primary">Artist</button></a>
                        </div>
      
                        <div class="col-md-3">
                          <a href="/album" class="nav-link"><button type="button" class="btn btn-primary">Album</button></a>
                        </div>
                 
                        <div class="col-md-3">
                          <a href="/register" class="nav-link"><button type="button" class="btn btn-primary">Register</button></a>
                        </div>
      
                        <div class="col-md-3">
                          <a href="/login" class="nav-link"><button type="button" class="btn btn-primary">Login</button></a>
                        </div>
      
                      </div>
                    @endauth

                    
                    <div class="accordion mt-5" >
                      <div class="accordion-item">
                         <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#acc1">
                               <h5>Total number of albums sold per artist:</h5>
                            </button>
                         </h2>
                         <div id="acc1" class="accordion-collapse collapse">
                            <div class="accordion-body">
                               <table class="table">
                                  <thead>
                                     <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sales</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($total_albums_sold_per_artist as $item)
                                     <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->sales}}</td>
                                     </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#acc2">
                               <h5>Combined album sales per artist:</h5>
                            </button>
                         </h2>
                         <div id="acc2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                               <table class="table">
                                  <thead>
                                     <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sales</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($combined_album_sales_per_artist as $item)
                                     <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->totalsales}}</td>
                                     </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#acc3">
                               <h5>Top 1 artist who sold most combined album sales:</h5>
                            </button>
                         </h2>
                         <div id="acc3" class="accordion-collapse collapse">
                            <div class="accordion-body">
                               <table class="table">
                                  <thead>
                                     <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sales</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($top_one as $item)
                                     <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->totalsales}}</td>
                                     </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                      <div class="accordion-item">
                         <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                               data-bs-target="#acc4">
                               <h5>Search Artist:</h5>
                            </button>
                         </h2>
                         <div id="acc4" class="accordion-collapse collapse">
                            <div class="accordion-body">
                               <table class="table">
                                  <thead>
                                     <tr>
                                        <th scope="col">Name</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($search_artist as $item)
                                     <tr>
                                        <td>{{$item->name}}</td>
                                     </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                    
  
                      
  
                      
  
  
  
  
                  </div>

                    <form action="/" method="GET" class="mt-5">
                      <div class="row">
                        <div class="col-9">
                          <input type="text" class="form-control" placeholder="Search Artist" name="artist">
                        </div>
                        <div class="col-3">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        
                      </div>
                    </form>
                  
            
                  <x-flash-message/>
                 
      
                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    
@endsection