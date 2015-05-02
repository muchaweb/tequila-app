{{--- Params--}}
@extends('admin.users.inner-layout')
@section ('active-link-2') active @stop
@section ('title') Registrar Nuevo Usuario @stop
{{--- Params --}}

{{--- Begin content --}}
@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

{{ Form::open(array('class' => 'form-horizontal login', 'autocomplete' => 'off')) }}

    <div class="form-group">
        <div class="col-md-4">
            <label for="" class="">Nombre(s)</label>
            {{ Form::text('name', null, array('class' => 'form-control input', 'placeholder' => 'Nombre(s)')) }}
            
            {{--- Error --}}
            @foreach($errors->get('name') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Apellidos</label>
            {{ Form::text('lastname', null, array('class' => 'form-control input', 'placeholder' => 'Apellidos')) }}
                
            {{--- Error --}}
            @foreach($errors->get('lastname') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}  
        </div>

        <div class="col-md-4">
            <label for="" class="">Grupo</label>
            {{ Form:: select('rol', $combobox, $selected, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('rol') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <label for="" class="">Nickname</label>
            {{ Form::text('nickname', null, array('class' => 'form-control input', 'placeholder' => 'Nombre.Puesto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('nickname') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Puesto</label>
            {{ Form::text('job',null, array('class' => 'form-control input', 'placeholder' => 'Puesto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('job') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Teléfono</label>
            {{ Form::text('phone',null, array('class' => 'form-control input', 'placeholder' => 'Télefono')) }}
            
            {{--- Error --}}
            @foreach($errors->get('phone') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <label for="" class="">Email</label>
            {{ Form::text('email', null, array('class' => 'form-control input', 'placeholder' => 'Email')) }}
            
            {{--- Error --}}
            @foreach($errors->get('email') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Password</label>
            {{ Form::password('password', array('class' => 'form-control input', 'placeholder' => 'Password')) }}
            
            {{--- Error --}}
            @foreach($errors->get('password') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Confirmar Password</label>
            {{ Form::password('password_confirmation', array('class' => 'form-control input', 'placeholder' => 'Confirmar Password')) }}
            
            {{--- Error --}}
            @foreach($errors->get('password_confirmation') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary right">Registrar</button>
        </div>
    </div>

 {{ Form::close() }}

@stop
{{--- End content --}}
