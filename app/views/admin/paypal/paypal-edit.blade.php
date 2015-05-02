@extends('admin.payment_methods.inner-layout')
@section ('title') Configuración de PayPal @stop

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
            <label for="" class="">URL de cancelación</label>
            
            {{ Form::text('cancel_url', Input::old('cancel_url') ? Input::old('cancel_url') : $paypal->cancel_url, array('class' => 'form-control input', 'placeholder' => 'URL de cancelar pago')) }}
            
            {{--- Error --}}
            @foreach($errors->get('cancel_url') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>

        <div class="col-md-6">
            <label for="" class="">URL de éxito</label>
            
            {{ Form::text('success_url', Input::old('success_url') ? Input::old('success_url') : $paypal->success_url, array('class' => 'form-control input', 'placeholder' => 'URL de cancelar pago')) }}
            
            {{--- Error --}}
            @foreach($errors->get('success_url') as $error)
                <span class="btn-danger btn-sm">{{ $error }}</span>
            @endforeach
            {{--- Error --}}
        </div>
    </div>

    <div class="form-group">
            <div class="col-md-6">
                <label for="" class="">Username</label>
                
                {{ Form::text('username', Input::old('username') ? Input::old('username') : $paypal->username, array('class' => 'form-control input', 'placeholder' => 'API Username')) }}
                
                {{--- Error --}}
                @foreach($errors->get('username') as $error)
                    <span class="btn-danger btn-sm">{{ $error }}</span>
                @endforeach
                {{--- Error --}}
            </div>

            <div class="col-md-6">
                <label for="" class="">API Password</label>
                
                {{ Form::text('password', Input::old('password') ? Input::old('password') : $paypal->password, array('class' => 'form-control input', 'placeholder' => 'Password')) }}
                
                {{--- Error --}}
                @foreach($errors->get('password') as $error)
                    <span class="btn-danger btn-sm">{{ $error }}</span>
                @endforeach
                {{--- Error --}}
            </div>
    </div>
    <div class="form-group">    
            <div class="col-md-12">
                <label for="" class="">API Signature</label>
                
                {{ Form::text('signature', Input::old('signature') ? Input::old('signature') : $paypal->signature, array('class' => 'form-control input', 'placeholder' => 'API Signature')) }}
                
                {{--- Error --}}
                @foreach($errors->get('signature') as $error)
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

 <div class="form-group">
     <div class="col-md-12">
         <label for="" class="">Modo Sandbox</label>
         {{ Form::open() }}
             <input type="checkbox"  onClick="this.form.submit()" {{ $paypal->sandbox ? 'checked' : '' }} />
             <input type="hidden" name="id" value="{{ $paypal->id }}">
         {{ Form::close() }}
     </div>
 </div>

@stop
{{--- End content --}}