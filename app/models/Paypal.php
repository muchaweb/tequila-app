<?php 
class Paypal extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paypal';

    public static $rules = array(
        'cancel_url'  =>  'required',
        'success_url' =>  'required',
        'username'    =>  'required',
        'password'    =>  'required',
        'signature'   =>  'required'
    );

    /**
    * Custom validation messages.
    *
    * @var array
    */
    public static $messages = array(
        'required'  => 'Campo obligatorio',
    );

}


?>