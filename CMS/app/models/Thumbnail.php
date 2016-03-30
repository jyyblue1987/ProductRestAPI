<?php 

class Thumbnail extends Eloquent { 
	
	protected $table = 'thumbnail';
	
	protected $fillable = array('thumbnail', 'product_id' );
	protected $hidden = array('product_id');
	
	public $timestamps = false;
	
	public function product()
    {
		return $this->belongsTo('Product');  		       
    }			
}