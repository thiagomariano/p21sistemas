@extends('adminlte::page')


@section('content')
    <input type="text" class="cpf">
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
                <a href="{{ route('admin.clients.index') }}">
                    <button href="" class="btn btn-danger" type="button"> Cancelar </button>
                </a>
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        console.log('12345');
    </script>
@stop
