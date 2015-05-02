@extends('admin.users.inner-layout')
@section ('active-link-1') active @stop
@section ('title') Cambiar Password @stop

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
            <button type="submit" class="btn btn-primary right">Cambiar password</button>
        </div>
    </div>

 {{ Form::close() }}

@stop
{{--- End content --}}