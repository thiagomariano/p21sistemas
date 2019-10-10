@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">LISTA DE FUNCIONÁRIOS</h3>
            <div class="pull-right">
                <a href="{{ route('admin.employees.create') }}">
                    <button href="" class="btn btn-success"> Novo funcionário</button>
                </a>
            </div>
        </div>
        <div class="box box-info">
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($employees->items())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="col-md-5">Nome</th>
                                        <th class="col-md-5">E-mail</th>
                                        <th class="col-md-2 text-center">Ações</th>
                                    </tr>
                                    @foreach($employees as $data)
                                        <tr>
                                            <td class="col-md-5">{{$data->name}}</td>
                                            <td class="col-md-5">{{$data->email}}</td>
                                            <td class="col-md-2 text-center">
                                                <a href="{!! route('admin.employees.destroy',['employee' => $data->id]) !!}">
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

                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@stop
