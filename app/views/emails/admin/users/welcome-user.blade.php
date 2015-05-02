<!--Welcome email-->
<h2>Bienvenido(a), {{ $name." ".$lastname }}!</h2>
<p>
    Su cuenta ha sido activada correctamente. Ahora puede ingresar al sistema {{ URL::to('/') }}
</p>
<p>Si tiene alguna duda o comentario, contáctenos: {{ $email }} o llámenos: {{ $phone }} </p>
<p>Atte. {{ $business }}</p>
<p>{{ $address }}</p>



