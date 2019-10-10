@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">LISTA DE EMAILS ENVIADOS</h3>
            <div class="pull-right">
                <a href="{{ route('admin.emails.create') }}">
                    <button href="" class="btn btn-success"> Enviar email</button>
                </a>
            </div>
        </div>
        <div class="box box-info">
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($emails->items())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="col-md-3">Assunto</th>
                                        <th class="col-md-3">Data de envio</th>
                                        <th class="col-md-3">Quantidade de emails enviados</th>
                                        <th class="col-md-3">Reenviar email</th>
                                    </tr>
                                    @foreach($emails as $data)
                                        <tr>
                                            <td class="col-md-3">{{$data->subject}}</td>
                                            <td class="col-md-3">
                                                {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}
                                                às
                                                {{  Carbon\Carbon::parse($data->date)->format('H:i:s') }}
                                            </td>
                                            <td class="col-md-3">{{$data->submissions}}</td>
                                            <td class="col-md-3">
                                                <a href="{!! route('admin.emails.send',['email' => $data->id]) !!}">
                                                    <i class="fas fa-paper-plane"></i>
                                                </a>
                                                <a href="{!! route('admin.emails.edit',['email' => $data->id]) !!}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{!! route('admin.emails.destroy',['email' => $data->id]) !!}">
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

                {!! $emails->links() !!}
            </div>
        </div>
    </div>
@stop
