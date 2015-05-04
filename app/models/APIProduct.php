<?php 
class APIProduct extends Eloquent{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';


    public function picture()
    {
       return $this->hasMany('APIGallery', 'id_product_fk');
    }   


    public function content()
    {
       return $this->hasOne('APIBottleSize', 'id', 'id_size_fk');
    } 


    public function box()
    {
       return $this->hasOne('APIAttribute', 'id', 'id_attribute_fk');
    } 
    
}


?>