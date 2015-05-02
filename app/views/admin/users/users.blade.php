@extends('admin.users.inner-layout')
@section ('active-link-1') active @stop
@section ('title') Listado de Usuarios @stop

@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <th>Nombre</th>
        <th>Rol</th>
        <th>Email</th>
        <th>Activo</th>
        <th>Editar</th>
        <th>Modificar password</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($users))
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }} {{ $user->lastname }}</td>
                <td>{{ $user->rol }}</td>
                <td>{{ $user->email }}</td>
                <td>
                {{ Form::open() }}
                    <input type="checkbox"  onClick="this.form.submit()" {{ $user->active ? 'checked' : '' }} />
                    <input type="hidden" name="id" value="{{ $user->id }}">
                {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ URL::route('user_edit_form', $user->id)}}" class="btn-primary btn-sm">Editar</a>
                </td>
                <td>
                    <a href="{{ URL::route('user_reset_password_form', $user->id)}}" class="btn-primary btn-sm">Editar password</a>
                </td>
                <td>
                    {{ Form::open(array('route' => array('user_delete', $user->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar usuario',
                        'data-message' => 'Está a punto de eliminar a '. $user->name.' '.$user->lastname.' ¿Desea continuar?',
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
            <p>No hay usuarios actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $users->links() }}
</div> 

@stop