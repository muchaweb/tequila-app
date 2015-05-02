@extends('admin.users.inner-layout')
@section ('active-link-1') active @stop
@section ('title') Editar Usuario @stop

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
            {{ Form::text('name', Input::old('name') ? Input::old('name') : $users->name, array('class' => 'form-control input', 'placeholder' => 'Nombre(s)')) }}
            
            {{--- Error --}}
            @foreach($errors->get('name') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Apellidos</label>
            {{ Form::text('lastname', Input::old('lastname') ? Input::old('lastname') : $users->lastname, array('class' => 'form-control input', 'placeholder' => 'Apellidos')) }}
                
            {{--- Error --}}
            @foreach($errors->get('lastname') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}  
        </div>

        <div class="col-md-4">
            <label for="" class="">Nickname</label>
            {{ Form::text('nickname', Input::old('nickname') ? Input::old('nickname') : $users->nickname, array('class' => 'form-control input', 'placeholder' => 'Nombre.Puesto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('nickname') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">

        <div class="col-md-3">
            <label for="" class="">Rol</label>
            {{ Form:: select('rol', $combo_rol, $selected_rol, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('rol') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-3">
            <label for="" class="">Puesto</label>
            {{ Form::text('job', Input::old('job') ? Input::old('job') : $users->job, array('class' => 'form-control input', 'placeholder' => 'Puesto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('job') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        
        <div class="col-md-3">
            <label for="" class="">Teléfono</label>
            {{ Form::text('phone',Input::old('phone') ? Input::old('phone') : $users->phone, array('class' => 'form-control input', 'placeholder' => 'Télefono')) }}
            
            {{--- Error --}}
            @foreach($errors->get('phone') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-3">
            <label for="" class="">Email</label>
            {{ Form::text('email', Input::old('email') ? Input::old('email') : $users->email, array('class' => 'form-control input', 'placeholder' => 'Email')) }}
            
            {{--- Error --}}
            @foreach($errors->get('email') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary right">Actualizar</button>
        </div>
    </div>

 {{ Form::close() }}

@stop
{{--- End content --}}