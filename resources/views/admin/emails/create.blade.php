@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Enviar Email</h3>
        </div>
        <div class="box box-info">
            <div class="box-body">
                {!! Form::open(['route' => 'admin.emails.store']) !!}
                    @include('admin.emails._form')
                    {!! Form::submit('Salvar', ['class' => 'btn btn-success']); !!}
                    {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']); !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

