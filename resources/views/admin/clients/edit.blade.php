@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Cliente</h3>
        </div>
        <div class="box box-info">

            <div class="box-body">
                {!! Form::model($client, [
                    'route' => ['admin.clients.update', 'client' => $client->id],
                    'method' => 'PUT'])
                !!}
                @include('admin.clients._form')

                {!! Form::submit('Salvar', ['class' => 'btn btn-success']); !!}
                {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']); !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

