@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Cliente</h3>
        </div>
        <div class="box box-info">

            <div class="box-body">
                {!! Form::model($email, [
                    'route' => ['admin.emails.update', 'email' => $email->id],
                    'method' => 'PUT'])
                !!}
                @include('admin.emails._form')

                {!! Form::submit('Salvar', ['class' => 'btn btn-success']); !!}
                <a href="{{ route('admin.emails.index') }}">
                    <button href="" class="btn btn-danger" type="button"> Cancelar </button>
                </a>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

