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
        {{ Form::label('Nome', null, ['class' => 'control-label']) }}
        {{ Form::text('name', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Documento', null, ['class' => 'control-label']) }}
        {{ Form::text('document', null, array_merge(['class' => 'form-control'])) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('CEP', null, ['class' => 'control-label']) }}
        {{ Form::text('postcode', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Endereço', null, ['class' => 'control-label']) }}
        {{ Form::text('address', null, array_merge(['class' => 'form-control'])) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('Distrito', null, ['class' => 'control-label']) }}
        {{ Form::text('district', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Cidade', null, ['class' => 'control-label']) }}
        {{ Form::text('city', null, array_merge(['class' => 'form-control'])) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('Estado', null, ['class' => 'control-label']) }}
        {{ Form::text('state', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Telefone', null, ['class' => 'control-label']) }}
        {{ Form::text('telephone', null, array_merge(['class' => 'form-control'])) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('E-Mail', null, ['class' => 'control-label']) }}
        {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Ativo', null, ['class' => 'control-label']) }}
        {{ Form::select('active', [0 => 'Sim', 1 => 'Não'], null, ['class' => 'form-control']) }}
    </div>
</div>
