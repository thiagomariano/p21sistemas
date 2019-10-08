@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Cliente</h3>
        </div>
        <div class="box box-info">
            <div class="box-body">
                {!! Form::open(['route' => 'admin.clients.store']) !!}

                @include('admin.clients._form')

                {!! Form::submit('Click Me!', ['class' => 'btn btn-success']); !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

