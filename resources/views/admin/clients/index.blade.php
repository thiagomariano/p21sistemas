@extends('adminlte::page')

@section('content-header')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">LISTA DE CLIENTES</h3>

            <div class="pull-right">
                <a href="{{ route('admin.clients.create') }}">
                    <button href="" class="btn btn-success"> Adicionar novo cliente</button>
                </a>

                <a href="{{ route('admin.clients.imports') }}">
                    <button href="" class="btn btn-warning"> Importar clientes</button>
                </a>
            </div>

        </div>
        <div class="box box-info">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($clients->items())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="col-md-2">Nome</th>
                                        <th class="col-md-2">E-mail</th>
                                        <th class="col-md-2">Estado</th>
                                        <th class="col-md-2">Cidade</th>
                                        <th class="col-md-1">Telefone</th>
                                        <th class="col-md-1">Ativo</th>
                                        <th class="col-md-2 text-center">Ações</th>
                                    </tr>
                                    @foreach($clients as $data)
                                        <tr>
                                            <td class="col-md-2">{{$data->name}}</td>
                                            <td class="col-md-2">{{$data->email}}</td>
                                            <td class="col-md-2">{{$data->state}}</td>
                                            <td class="col-md-2">{{$data->city}}</td>
                                            <td class="col-md-1">{{$data->telephone}}</td>
                                            <td class="col-md-1">{{$data->active ? 'Não' : 'Sim'}}</td>
                                            <td class="col-md-2 text-center">
                                                <a href="{!! route('admin.clients.edit',['client' => $data->id]) !!}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{!! route('admin.clients.destroy',['client' => $data->id]) !!}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
                </div>

                {!! $clients->links() !!}
            </div>
        </div>
    </div>
@stop
