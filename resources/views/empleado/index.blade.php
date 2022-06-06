@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif




<a href="{{ url('empleado/create') }}" class="btn btn-success"> Crear Empleado</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach ($empleados as $empleado)
        <td>{{ $empleado->id }}</td>


        <td>
            <img class="img-thumbnail img -fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
        </td>


        <td>{{ $empleado->Nombre }}</td>
        <td>{{ $empleado->ApellidoPaterno }}</td>
        <td>{{ $empleado->ApellidoMaterno }}</td>
        <td>{{ $empleado->Correo }}</td>
        <td>
            
        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">Editar</a>
        | 
    <form action="{{ url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
        @csrf
    
    {{ method_field('DELETE') }}

    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')"
    value="Borrar" >

</form>
            
        
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection