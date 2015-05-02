{{--Confirmation code email--}}
<h2>Estimado(a), {{ $name." ".$lastname }}!</h2>
<p>
    Su password ha sido modificado correctamente.
</p>
<p>
    Su nuevo password es el siguiente: {{ $password }}
</p>
<p>Si tiene alguna duda o comentario, contáctenos: {{ $email }} o llámenos: {{ $phone }} </p>
<p>Atte. {{ $business }}</p>
<p>{{ $address }}</p>

