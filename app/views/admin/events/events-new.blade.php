@extends('admin.events.inner-layout')
@section ('title') Registrar Nuevo Evento @stop

{{--- Begin content --}}
@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

{{ Form::open(array('class' => 'form-horizontal login', 'autocomplete' => 'off')) }}

    <div class="form-group">
        <div class="col-md-6">
            <label for="" class="">Evento</label>
            {{ Form::text('event', null, array('class' => 'form-control input', 'placeholder' => 'Evento')) }}
            
            {{--- Error --}}
            @foreach($errors->get('event') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-6">
            <label for="" class="">Activar</label>
            {{ Form::select('active', [
               '0' => 'No',
               '1' => 'Sí']
            ,null, ['class' => 'form-control input']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
         <label for="" class="">Descripción</label>
         {{ Form::textarea('description', null, ['class' => 'form-control input']) }}

         {{--- Error --}}
         @foreach($errors->get('description') as $error) 
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
