@extends('admin.customers.inner-layout')
@section ('title') Listado de Clientes @stop

@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Registrado</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($customers))
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name_customer }} {{ $customer->lastname_customer }}</td>
                <td>{{ $customer->phone_customer }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    {{ Form::open(array('route' => array('customer_delete', $customer->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar cliente',
                        'data-message' => 'Está a punto de eliminar a '. $customer->name_customer.' '.$customer->lastname_customer.' ¿Desea continuar?',
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
            <p>No hay clientes actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $customers->links() }}
</div> 

@stop