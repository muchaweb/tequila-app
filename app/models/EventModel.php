<?php 
class EventModel extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
    * Validation rules for event registration form.
    *
    * @var array
    */
    public static $rules = array(
        'event'         =>  'required',
        'description'   =>  'required'
    );

    /**
    * Custom validation messages.
    *
    * @var array
    */
    public static $messages = array(
        'required'  => 'Campo obligatorio'
    );

}


?>