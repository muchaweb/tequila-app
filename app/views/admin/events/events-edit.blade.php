@extends('admin.events.inner-layout')
@section ('title') Editar Evento @stop

{{--- Begin content --}}
@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

{{ Form::open(array('class' => 'form-horizontal login', 'autocomplete' => 'off')) }}

    <div class="form-group">
        <div class="col-md-12">
            <label for="" class="">Evento</label>
            {{ Form::text('event', Input::old('event') ? Input::old('event') : $event->event, array('class' => 'form-control input', 'placeholder' => 'Evento')) }}
            
            {{--- Error --}}
            @foreach($errors->get('event') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <label for="" class="">Descripción</label>
            {{ Form::textarea('description', Input::old('description') ? Input::old('description') : $event->description, ['class' => 'form-control input']) }}
            
            {{--- Error --}}
            @foreach($errors->get('description') as $error)
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