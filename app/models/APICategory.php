<?php 
class APICategory extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function category_product()
    {
       return $this->hasMany('APIProduct', 'id_category_fk');
    }   

    
}


?>