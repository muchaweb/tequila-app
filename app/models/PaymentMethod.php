<?php 
class PaymentMethod extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_methods';

    /**
    * Validation rules for payment method registration form.
    *
    * @var array
    */
    public static $rules = array(
        'payment_method'       =>  'required',
        'description'           =>  'required'
    );

    /**
    * Custom validation messages.
    *
    * @var array
    */
    public static $messages = array(
        'required'  => 'Campo obligatorio',
        'numeric'     => 'Sólo debe contener letras',
    );

}


?>