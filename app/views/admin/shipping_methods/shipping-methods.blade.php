@extends('admin.shipping_methods.inner-layout')
@section ('active-link-1') active @stop
@section ('title') Métodos de envío @stop

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
        <th>Tarifa</th>
        <th>Activo</th>
        <th>Editar</th>
        <th>Ordenar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($shipping_methods))
            @foreach($shipping_methods as $shipping_method)
            <tr>
                <td>{{ $shipping_method->shipping_method }} </td>
                <td>{{ $shipping_method->description }}</td>
                <td>{{ $shipping_method->cost }}</td>
                <td>
                {{ Form::open() }}
                    <input type="checkbox"  onClick="this.form.submit()" {{ $shipping_method->active ? 'checked' : '' }} />
                    <input type="hidden" name="id" value="{{ $shipping_method->id }}">
                {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ URL::route('shipping_method_edit_form', $shipping_method->id)}}" class="btn-primary btn-sm">Editar</a>
                </td>
                <td>
                    <a href="" class="ordering" id="ordering" data-type="text" data-pk="{{ $shipping_method->id }}">{{ $shipping_method->ordering }}</a>
                </td>
                <td>
                    {{ Form::open(array('route' => array('shipping_method_delete', $shipping_method->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar método de envío',
                        'data-message' => 'Está a punto de eliminar el método de '. $shipping_method->shipping_method.' ¿Desea continuar?',
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
            <p>No hay métodos de envío actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $shipping_methods->links() }}
</div> 

@stop