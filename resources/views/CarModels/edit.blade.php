@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/CarModels/'.$datosCar->id) }}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('CarModels.form',['Modo'=>'editar'])




</form>
</div>
@endsection
