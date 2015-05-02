{{--- Params--}}
@extends('admin.products.inner-layout')
@section ('title') Editar @stop
{{--- Params --}}

{{--- Begin content --}}
@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

{{ Form::open(array('class' => 'form-horizontal login', 'autocomplete' => 'off', 'files' => true)) }}

    <div class="form-group">
        <div class="col-md-8">
            <label for="" class="">Nombre del producto</label>
            {{ Form::text('product', Input::old('product') ? Input::old('product') : $products->product, array('class' => 'form-control input', 'placeholder' => 'Nombre del producto')) }}
            
            {{--- Error --}}
            @foreach($errors->get('product') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Precio</label>
            {{ Form::text('price', Input::old('price') ? Input::old('price') : $products->price, array('class' => 'form-control input', 'placeholder' => 'Precio')) }}
                
            {{--- Error --}}
            @foreach($errors->get('price') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}  
        </div>
    </div>
    <div class="form-group">
        
        <div class="col-md-4">
            <label for="" class="">Moneda</label>
            {{ Form:: select('currency', $combo_currency, $selected_currency, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('currency') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Presentación</label>
            {{ Form:: select('size', $combo_size, $selected_size, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('size') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-4">
            <label for="" class="">Etiqueta</label>
            {{ Form:: select('label', $combo_label, $selected_label, (array('class' => 'form-control input', 'placeholder' => 'Seleccione'))) }}

            {{--- Error --}}
            @foreach($errors->get('label') as $error) 
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    
    </div>

    <div class="form-group">
        <div class="col-md-12">
         <label for="" class="">Descripción</label>
         {{ Form::textarea('description', Input::old('description') ? Input::old('description') : $products->description, array('class' => 'form-control input', 'placeholder' => 'Descripción')) }}

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
