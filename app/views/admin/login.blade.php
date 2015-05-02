<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    {{ HTML::style('css/vendor/bootstrap.min.css') }}
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/style.css') }}
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div id="form-signup">   
        @if(Session::has('invalid'))
            <div class="alert alert-danger invalid-access">
                <h3>{{Session::get('invalid') }}</h3>
            </div>
        @endif 
         {{ Form::open(array('url' => '/admin', 'class' => 'login', 'autocomplete' => 'off')) }}

            <div class="form-group col-sm-6">
                <label for="">Nickname</label> 
                @if ($errors->has('nickname'))  <span class="label label-danger">Obligatorio</span>  
                <div class="input-group has-error">
                @else
                <div class="input-group">
                @endif
                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        {{ Form::text('nickname', null, array('class' => 'form-control input', 'placeholder' => 'Nickname')) }}
                </div>
            </div>

            <div class="form-group col-sm-6">
                <label for="">Password</label>
                @if ($errors->has('password'))  <span class="label label-danger">Obligatorio</span>  
                <div class="input-group has-error">
                @else
                <div class="input-group">
                @endif
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        {{ Form::password('password', array('class' => 'form-control input', 'placeholder' => 'Password')) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <a href="#" class="right">¿Olvidó su password?</a>
                </div>
                <div class="col-sm-12">
                {{ Form::submit('Ingresar', array('class' => 'btn btn-blue-dark right')) }}
                </div>
            </div>
        {{ Form::close() }}

    </div>
</div>


</body>
</html>