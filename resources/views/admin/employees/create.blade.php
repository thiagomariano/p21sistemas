@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Enviar Funcionário</h3>
        </div>
        <div class="box box-info">
            <div class="box-body">
                {!! Form::open(['route' => 'admin.employees.store']) !!}
                @include('admin.employees._form')
                {!! Form::submit('Salvar', ['class' => 'btn btn-success']); !!}
                <a href="{{ route('admin.employees.index') }}">
                    <button href="" class="btn btn-danger" type="button"> Cancelar</button>
                </a>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

