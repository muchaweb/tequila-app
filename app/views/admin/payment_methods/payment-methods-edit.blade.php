@extends('admin.payment_methods.inner-layout')
@section ('title') Editar Método de Pago @stop

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
            <label for="" class="">Método de pago</label>
            
            {{ Form::text('payment_method', Input::old('payment_method') ? Input::old('payment_method') : $pm->payment_method, array('class' => 'form-control input', 'placeholder' => 'Método de pago')) }}
            
            {{--- Error --}}
            @foreach($errors->get('payment_method') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">

        <div class="col-md-12">
            <label for="" class="">Descripción</label>
            {{ Form::textarea('description', Input::old('description') ? Input::old('description') : $pm->description, ['class' => 'form-control input']) }}
            
            {{--- Error --}}
            @foreach($errors->get('description') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            @if($pm->id == 2)
                <a href="{{ URL::route('paypal_edit', $pm->id)}}" class="btn-primary btn-sm">Configurar PayPal</a>
            @endif
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