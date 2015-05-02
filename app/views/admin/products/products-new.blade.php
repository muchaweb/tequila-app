@extends('admin.products.inner-layout')
@section ('title') Registrar Nuevo Producto @stop

{{--- Begin content --}}
@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

{{ Form::open(array('class' => 'form-horizontal login', 'autocomplete' => 'off', 'files' => true)) }}

    <div class="form-group">
        <div class="col-md-6">
            <label for="" class="">Nombre del producto</label>
            {{ Form::text('product', null, array('class' => 'form-control input', 'placeholder' => 'Nombre del producto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('product') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-6">
            <label for="">Imagen</label>
            {{ Form::file('image',array('class' => 'form-control input')) }}

            {{--- Error --}}
            @foreach($errors->get('image') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <label for="" class="">Precio</label>
            {{ Form::text('price', null, array('class' => 'form-control input', 'placeholder' => 'Precio')) }}
                
            {{--- Error --}}
            @foreach($errors->get('price') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}  
        </div>
        
        <div class="col-md-2">
            <label for="" class="">Moneda</label>
            {{ Form:: select('currency', $combo_currency, $selected_currency, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('currency') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-3">
            <label for="" class="">Presentación</label>
            {{ Form:: select('size', $combo_size, $selected_size, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('size') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-2">
            <label for="" class="">Etiqueta</label>
            {{ Form:: select('label', $combo_label, $selected_label, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('label') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-2">
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
