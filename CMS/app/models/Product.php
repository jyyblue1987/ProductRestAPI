<?php 

class Product extends Eloquent { 
	
	protected $table = 'product';
	
	protected $fillable = array('name', 'category', 'desc' );
	
	public $timestamps = false;
	
	public function thumbnail()
    {
		return $this->hasMany('Thumbnail');        
    }			
}