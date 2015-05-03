@extends('admin.templates.inner-layout')
@section ('title') Listados de Eventos @stop

@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

<a href="{{ URL::route('event_add_new_form')}}" class="right btn-primary btn-sm">Nuevo</a>

<table class="table table-striped table-hover">
    <thead>
        <th>Evento</th>
        <th>Plantillas</th>
        <th>Activo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($templates))
            @foreach($templates as $template)
            <tr>
                <td>{{ $template->event }} </td>
                <td>
                    <p>
                        <a>
                            {{ HTML::image('uploads/templates/'.$template->path_image, '', array('width' => 200)) }}
                        </a>
                    </p>
                    <p>
                        <a href="{{ URL::route('template_form', $template->id)}}" class="btn-primary btn-sm">Ver plantillas</a>
                    </p>
                </td>
+                <td>
                {{ Form::open() }}
                    <input type="checkbox"  onClick="this.form.submit()" {{ $template->active ? 'checked' : '' }} />
                    <input type="hidden" name="id" value="{{ $template->id }}">
                {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ URL::route('event_edit_form', $template->id)}}" class="btn-primary btn-sm">Editar</a>
                </td>
                <td>
                    {{ Form::open(array('route' => array('event_delete', $template->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar evento',
                        'data-message' => 'Está a punto de eliminar el evento '. $template->event.' ¿Desea continuar?',
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
            <p>No hay plantillas actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $templates->links() }}
</div> 

@stop