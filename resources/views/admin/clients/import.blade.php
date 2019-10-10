@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Cliente</h3>
        </div>
        <div class="box box-info">
            <div class="box-body">
                {!! Form::open(['route' => 'admin.clients.imports.file', 'enctype="multipart/form-data"']) !!}

                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($result)
                    <div class="alert alert-success">
                        <ul>
                            <li>Foram lidas {{ $result['total'] }} linhas de registro.</li>
                            <li>Foram criados {{ $result['created'] }} usuários novos.</li>
                            <li>Foram alterados {{ $result['updated'] }} registros.</li>
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('Arquivo XML', null, ['class' => 'control-label']) }}
                        {{ Form::file('file', null, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>

                {!! Form::submit('Salvar', ['class' => 'btn btn-success']); !!}
                {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']); !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

