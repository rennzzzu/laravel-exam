@if( session()->has('message') )
    <p class="text-success text-center">{{session('message')}}</p>
@endif
 