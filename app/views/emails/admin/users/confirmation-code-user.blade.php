{{--Confirmation code email--}}
<h2>Bienvenido(a), {{ $name." ".$lastname }}!</h2>
<p>
    Su usuario ha sido registrado correctamente.
</p>
<p>
    Para continuar, verifique su cuenta ingresando en el siguiente link: {{ URL::to('register/verify/' . $confirmation_code) }} 
</p>

<p>
    Posteriormente le enviaremos sus datos de acceso.
</p>
<p>Si tiene alguna duda o comentario, contáctenos: {{ $email }} o llámenos: {{ $phone }} </p>
<p>Atte. {{ $business }}</p>
<p>{{ $address }}</p>

