<?php 
class APIEvent extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';


    public function template_event()
    {
       return $this->hasMany('APITemplate','id','id_event_fk');
    } 
    
}


?>