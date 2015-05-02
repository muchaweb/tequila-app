<?php 
class ShippingMethod extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shipping_methods';

    /**
    * Validation rules for shipping method registration form.
    *
    * @var array
    */
    public static $rules = array(
        'shipping_method'       =>  'required',
        'cost'                  =>  'required',
        'description'           =>  'required'
    );

    /**
    * Custom validation messages.
    *
    * @var array
    */
    public static $messages = array(
        'required'  => 'Campo obligatorio',
        'alpha'     => 'Sólo debe contener letras',
    );

}


?>