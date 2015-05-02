{{-- Modal window for description --}}

<div class="modal fade" id="description{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Descripción | {{ $product->product }}</h4>
      </div>
      <div class="modal-body">
        {{ HTML::image('uploads/'.$product->path_image, '', array('class' => 'product__photo','width' => 250)) }}
        <p>{{ $product->description }}</p> 
      </div>
    </div>
  </div>
</div>
{{--End window modal for description--}}