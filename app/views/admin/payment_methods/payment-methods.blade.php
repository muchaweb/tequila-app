@extends('admin.payment_methods.inner-layout')
@section ('title') Listado de Métodos de pago @stop

@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <th>Métodos</th>
        <th>Descripción</th>
        <th>Activo</th>
        <th>Editar</th>
        <th>Ordenar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($payment_methods))
            @foreach($payment_methods as $payment_method)
            <tr>
                <td>{{ $payment_method->payment_method }} </td>
                <td>{{ $payment_method->description }}</td>
                <td>
                {{ Form::open() }}
                    <input type="checkbox"  onClick="this.form.submit()" {{ $payment_method->active ? 'checked' : '' }} />
                    <input type="hidden" name="id" value="{{ $payment_method->id }}">
                {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ URL::route('payment_method_edit_form', $payment_method->id)}}" class="btn-primary btn-sm">Editar</a>
                </td>
                <td>
                    <a href="">Ordenar</a>
                </td>

                <td>
                    {{ Form::open(array('route' => array('payment_method_delete', $payment_method->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar método de pago',
                        'data-message' => 'Está a punto de eliminar el método de '. $payment_method->payment_method.' ¿Desea continuar?',
                        'data-btncancel'  => 'btn-default',
                        'data-btnaction' => 'btn-danger',
                        'data-btntxt' => 'Disable'
                        )) 
                    }}
                    {{ Form::close() }}

                    @include('admin.includes.modal-confirm-delete')
                </td>
            </tr>
            @endforeach
        @else 
            <p>No hay métodos de pago actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $payment_methods->links() }}
</div> 

@stop