<?php 

class Product extends Eloquent { 
	use SortableTrait;
	
	protected $table = 'product';
	
	protected $fillable = array('name', 'category', 'desc', 'type' );
	
	public $timestamps = false;
	
	public function thumbnail()
    {
		return $this->hasMany('Thumbnail');        
    }			
}