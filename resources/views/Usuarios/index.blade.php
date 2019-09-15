@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje'))
   

    <div class="alert alert-success" role="alert">

    {{Session::get('Mensaje')}}

    </div>

@endif



<a href="{{  url('Usuarios/create') }}"  class="btn btn-success">Add User</a>




<br/>
<br/>
<table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Username</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
           
            <th>User Role</th>
            
            <th> Actions </th>
            
        </tr>
    </thead>
    <tbody>

     @foreach($usuarios as $usuario)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->username}}</td>
            <td>{{$usuario->email}}</td>
            <!-- <td>{{$usuario->password}}</td> -->
            <td>{{$usuario->role_id}}</td>
            
            
            <td><a class="btn btn-warning " href="{{ url('/Usuarios/'.$usuario->id.'/edit')}}">Edit</a> 
             | 
        
            
            <form method="post" action="{{ url('/Usuarios/'.$usuario->id)}}" style="display:inline">
            {{csrf_field()}}
            {{method_field('DELETE')}} <!-- CAMPO PARA IDENTIFICAR BORRADO -->
            
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Delete</button>

            </form>
        </td>

        </tr>

      @endforeach  
    </tbody>
</table>


{{ $usuarios->links() }}  <!-- paginacion  $carbrands viene de CarBrandsController paginate-->
</div>

@endsection
