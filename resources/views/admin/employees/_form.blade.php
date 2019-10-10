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
        {{ Form::label('Email', null, ['class' => 'control-label']) }}
        {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}

    </div>

</div>

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('Password', null, ['class' => 'control-label']) }}
        <!-- o tipo do campo Form::password esta ignorando o css-->
        <input class="form-control" name="password" type="password">
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('Repetir Senha', null, ['class' => 'control-label']) }}
        <!-- o tipo do campo Form::password esta ignorando o css-->
        <input class="form-control" name="password_confirmation" type="password">
    </div>

</div>
