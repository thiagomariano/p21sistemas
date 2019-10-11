@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">LISTA DE IMPORTAÇÕES</h3>
        </div>
        <div class="box box-info">
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($imports->items())
                                <table class="table table-hover">
                                    <tr>

                                        <th class="col-md-4">Arquivo</th>
                                        <th class="col-md-2">Total</th>
                                        <th class="col-md-2">Criado</th>
                                        <th class="col-md-2">Editado</th>
                                        <th class="col-md-2">Data</th>
                                    </tr>
                                    @foreach($imports as $data)
                                        <tr>
                                            <td class="col-md-4">{{$data->file}}</td>
                                            <td class="col-md-2">{{$data->total}}</td>
                                            <td class="col-md-2">{{$data->created}}</td>
                                            <td class="col-md-2">{{$data->updated}}</td>
                                            <td class="col-md-2">
                                                {{  Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i:s') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
                </div>

                {!! $imports->links() !!}
            </div>
        </div>
    </div>
@stop
