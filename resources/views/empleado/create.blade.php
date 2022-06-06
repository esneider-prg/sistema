@extends('layouts.app')

@section('content')
<div class="container">
    crear los registros

    <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('empleado.form',['modo'=>'Crear']);

    </form>
    </div>
@endsection