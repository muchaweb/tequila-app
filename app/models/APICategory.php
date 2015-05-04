<?php 
class APICategory extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function list_categories()
    {
       return $this->hasManyThrough('APIProduct', 'APICategory', 'id','id');
    }  
    
}


?>