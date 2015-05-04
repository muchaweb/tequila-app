
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
        <div class="col-md-9">
            <label for="" class="">Evento</label>
            @endforeach
            {{ Form::text('event', null, array('class' => 'form-control input', 'placeholder' => 'Evento')) }}
            
            {{--- Error --}}
            @foreach($errors->get('event') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9">
            <label for="" class="">Plantilla</label>
            {{ Form::file('image',array('class' => 'form-control input')) }}

            {{--- Error --}}
            @foreach($errors->get('image') as $error) 
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