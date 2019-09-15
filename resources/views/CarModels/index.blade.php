@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje'))
   

    <div class="alert alert-success" role="alert">

    {{Session::get('Mensaje')}}

    </div>

@endif

@if(Auth::user()->esAdmin())

<a href="{{  url('CarModels/create') }}"  class="btn btn-success">Add Model</a>



@endif
<br/>
<br/>
<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Model</th>
            
            <th>@if(Auth::user()->esAdmin())   Actions @endif</th>
            
        </tr>
    </thead>
    <tbody>

     @foreach($carmodels as $carmodel)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$carmodel->Model}}</td>
            
            <td>@if(Auth::user()->esAdmin())<a class="btn btn-warning " href="{{ url('/CarModels/'.$carmodel->id.'/edit')}}">Edit</a> 
             | @endif
        
            
            <form method="post" action="{{ url('/CarModels/'.$carmodel->id)}}" style="display:inline">
            {{csrf_field()}}
            {{method_field('DELETE')}} <!-- CAMPO PARA IDENTIFICAR BORRADO -->
            
            @if(Auth::user()->esAdmin())
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Delete</button>
            @endif
            </form>
        </td>

        </tr>

      @endforeach  
    </tbody>
</table>


{{ $carmodels->links() }}  <!-- paginacion  $carbrands viene de CarBrandsController paginate-->
</div>

@endsection
