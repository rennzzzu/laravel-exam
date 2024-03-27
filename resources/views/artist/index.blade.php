@extends('layout')


@section('content')


    <section  style="background-color: #3da2c3;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body p-4">
      
                  <p class="mb-2"><span class="h2 me-2">Artist</span></p>

                  
                  
                    
                    <table class="table">
                      
                      <tbody>
                        @foreach($artist as $item)
                        <tr>  
                          <td><a href="/artist/{{$item->id}}">{{$item->name}}</a></td>
                          <td><a href="/artist/{{$item->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a></td>
                          <td>
                            <form method="POST" action="/artist/{{$item->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>  

                        
                      
                        @endforeach
                       
                      
                        
                        
                      </tbody>
                    </table>


                    
               
          
                  
                  
                  
                  
                
                  <x-flash-message/>
                 
      
                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    
@endsection