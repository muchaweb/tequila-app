<?php 
class Product extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * Validation rules for event registration form.
    *
    * @var array
    */
    public static $rules = array(
        'product'     =>  'required',
        'description' =>  'required',
        'size'        =>  'required',
        'currency'    =>  'required',
        'label'       =>  'required',
        'price'       =>  'required',
        'image'       => 'required|image|mimes:jpeg,jpg,bmp,png,gif'
    );

    public static $rules_edit = array(
        'product'     =>  'required',
        'description' =>  'required',
        'size'        =>  'required',
        'currency'    =>  'required',
        'label'       =>  'required',
        'price'       =>  'required',
    );

    /**
    * Custom validation messages.
    *
    * @var array
    */
    public static $messages = array(
        'required'  => 'Campo obligatorio',
        'image'     => 'Debe subir una imagen',
        'mimes'     => 'Revise el tipo de archivo'
    );   

}


?>