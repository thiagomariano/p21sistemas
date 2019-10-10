@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('Assunto', null, ['class' => 'control-label']) }}
        {{ Form::text('subject', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Enviar email agora?', null, ['class' => 'control-label']) }}
        {{ Form::select('send', [0 => 'Sim', 1 => 'Não'], 1, ['class' => 'form-control']) }}

    </div>




</div>

<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('Descrição', null, ['class' => 'control-label']) }}
        {{ Form::textarea('description', null, array_merge(['class' => 'form-control'])) }}
    </div>
</div>
