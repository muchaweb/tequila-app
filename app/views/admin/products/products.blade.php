@extends('admin.products.inner-layout')
@section ('title') Listado de Productos @stop

@section('content')

@if(Session::has('success'))
    <div class="btn-success btn-sm">{{Session::get('success')}}</div>
@elseif(Session::has('error'))
    <div class="btn-danger btn-sm invalid-access">{{Session::get('error')}}</div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <th>ID</th>
        <th>Producto</th>
        <th>Vista previa</th>        
        <th>Precio</th>
        <th>Activo</th>
        <th>Editar</th>
        <th>Atributos</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        @if(count($products))
            @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    <p>
                        {{ $product->product }}
                    </p> 
                    <p>
                        Tamaño: {{ $product->size }}
                    </p>
                    <p>
                        Etiqueta: {{ $product->label }}
                    </p>
                    @include('admin.includes.modal-detail-product')
                </td>
                <td>
                    <a href="#description{{ $product->id }}" data-toggle="modal" data-target="#description{{ $product->id }}">
                        {{ HTML::image('uploads/'.$product->path_image, '', array('width' => 80)) }}
                    </a>
                </td>
                <td>${{ $product->price }} {{ $product->prefix }}</td>
                <td>
                    {{ Form::open() }}
                        <input type="checkbox"  onClick="this.form.submit()" {{ $product->active ? 'checked' : '' }} />
                        <input type="hidden" name="id" value="{{ $product->id }}">
                    {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ URL::route('product_edit_form', $product->id)}}" class="btn-primary btn-sm">Editar</a>
                </td>
                <td>
                    <a href="" class="btn-primary btn-sm">Atributos</a>
                </td>
                <td>
                    {{ Form::open(array('route' => array('product_delete', $product->id))) }}
                    {{ Form::button('Eliminar', array(
                        'class' => 'btn btn-danger btn-sm',
                        'data-toggle' => 'modal',
                        'data-target' => '#confirmDelete',
                        'data-title' => 'Eliminar producto',
                        'data-message' => 'Está a punto de eliminar el producto: '. $product->product.' ¿Desea continuar?',
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
            <p>No hay productos actualmente.</p>
        @endif
    </tbody>
</table>

<div class="right">
    {{ $products->links() }}
</div> 

@stop