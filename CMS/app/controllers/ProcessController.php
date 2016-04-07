<?php
define("UNKNOWN", "0"); 			// unknown
define("SUCCESS", "200"); 			// successfully

define("MISSING_PARAMETER", "100"); // Parameter missing
define("INVALID_PARAMETER", "101"); // Parameter is invacheckUserValiditylid

define("USER_EXIST", "201");		// user already exist
define("NO_VERIFIED", "202"); 		// not verified user
define("STATUS_INACTIVE", "203"); 	// status inactive

define("NO_USER_EXIST", "301"); 	// user not exist
define("INVALID_PASSWORD", "302");	// user or password is not valid
define("INVALID_VCODE", "303");		// verify code is invalid
define("NO_PERMISSIONS", "304"); 	// no permissions
define("EXPIRED_VCODE", "305");		// verify code is expired
define("SERVER_INTERNAL_ERROR", "401"); // server process error


class ProcessController extends BaseController
{
	function process($action)
	{	
		switch($action)
		{
			case 'addProduct';
				$this->addProduct();				
				break;	
			case 'updateProduct';
				$this->updateProduct();				
				break;		
			case 'deleteProduct';
				$this->deleteProduct();				
				break;	
			case 'getproductdata1';
				$this->getProductList();				
				break;
			case 'addProduct2';
				$this->addProduct2();				
				break;	
			case 'updateProduct2';
				$this->updateProduct2();				
				break;		
			case 'deleteProduct2';
				$this->deleteProduct2();				
				break;	
			case 'getproductdata2';
				$this->getProductList2();				
				break;
			case 'getproductdata';
				$this->getproductdata();				
				break;
				
		}		
	}		
	
	private function getProductList()
	{
		$data = Product::where('type', '1')->get();
		
		foreach($data as $value)
		{
			$value->thumbnail;
		}
		
		$this->outputResult(SUCCESS, $data );
	}

	
	private function addProduct()
	{
		if( Input::has('name') == false ||
			Input::has('category') == false ||
			Input::has('desc') == false ||
			Input::has('thumbnail') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
				
		$product = new Product();
		
		$product->name = Input::get('name', '');
		$product->desc = Input::get('desc', '');
		$product->category = Input::get('category', '');
		$product->type = 1;
		
		$thumbnails = explode("|", Input::get('thumbnail', ''));
		
		$ret = $product->save();
		if( $ret == false )
		{
			$this->outputResult(SERVER_INTERNAL_ERROR);		
			return;
		}
		
		for($i = 0; $i < count($thumbnails); $i++ )
		{
			if( empty($thumbnails[$i]) )
				continue;
			
			$thumbnail = new Thumbnail;
			$thumbnail->thumbnail = $thumbnails[$i];
			$thumbnail->product_id = $product->id;
			
			$thumbnail->save();
		}
		
		$this->outputResult(SUCCESS, $product );					
	}
	
	private function updateProduct()
	{
		if( Input::has('product_id') == false ||
			Input::has('name') == false ||
			Input::has('category') == false ||
			Input::has('desc') == false ||
			Input::has('thumbnail') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
				
		$product = Product::find(Input::get('product_id', '0'));
		if( empty($product) )
		{
			$this->outputResult(UNKNOWN, "There is no product." );
			return;
		}
		
		$product->name = Input::get('name', '');
		$product->desc = Input::get('desc', '');
		$product->category = Input::get('category', '');
		$product->type = 1;
			
		$ret = $product->save();
		
		Thumbnail::where('product_id', $product->id)->delete();
		
		if( $ret == false )
		{
			$this->outputResult(SERVER_INTERNAL_ERROR);		
			return;
		}
		
		$thumbnails = explode("|", Input::get('thumbnail', ''));
		
		for($i = 0; $i < count($thumbnails); $i++ )
		{
			if( empty($thumbnails[$i]) )
				continue;
			
			$thumbnail = new Thumbnail;
			$thumbnail->thumbnail = $thumbnails[$i];
			$thumbnail->product_id = $product->id;
			
			$thumbnail->save();
		}
		
		$this->outputResult(SUCCESS, $product );				
	}
	
	private function deleteProduct()
	{
		if( Input::has('product_id') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
		
		$product = Product::find(Input::get('product_id', '0'));
		if( empty($product) )
		{
			$this->outputResult(UNKNOWN, "There is no product." );
			return;
		}
		
		Product::where('id', Input::get('product_id', '0'))->delete();
		Thumbnail::where('product_id', Input::get('product_id', '0'))->delete();
		
		$this->outputResult(SUCCESS, array() );				
	}
	
	private function getProductList2()
	{
		$data = Product::where('type', '2')->get();
		
		foreach($data as $value)
		{
			$value->thumbnail;
		}
		
		$this->outputResult(SUCCESS, $data );
	}

	
	private function addProduct2()
	{
		if( Input::has('name') == false ||
			Input::has('category') == false ||
			Input::has('desc') == false ||
			Input::has('thumbnail') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
				
		$product = new Product();
		
		$product->name = Input::get('name', '');
		$product->desc = Input::get('desc', '');
		$product->category = Input::get('category', '');
		$product->type = 2;
		
		$thumbnails = explode("|", Input::get('thumbnail', ''));
		
		$ret = $product->save();
		if( $ret == false )
		{
			$this->outputResult(SERVER_INTERNAL_ERROR);		
			return;
		}
		
		for($i = 0; $i < count($thumbnails); $i++ )
		{
			if( empty($thumbnails[$i]) )
				continue;
			
			$thumbnail = new Thumbnail;
			$thumbnail->thumbnail = $thumbnails[$i];
			$thumbnail->product_id = $product->id;
			
			$thumbnail->save();
		}
		
		$this->outputResult(SUCCESS, $product );					
	}
	
	private function updateProduct2()
	{
		if( Input::has('product_id') == false ||
			Input::has('name') == false ||
			Input::has('category') == false ||
			Input::has('desc') == false ||
			Input::has('thumbnail') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
				
		$product = Product::find(Input::get('product_id', '0'));
		if( empty($product) )
		{
			$this->outputResult(UNKNOWN, "There is no product." );
			return;
		}
		
		$product->name = Input::get('name', '');
		$product->desc = Input::get('desc', '');
		$product->category = Input::get('category', '');
		$product->type = 2;
			
		$ret = $product->save();
		
		Thumbnail::where('product_id', $product->id)->delete();
		
		if( $ret == false )
		{
			$this->outputResult(SERVER_INTERNAL_ERROR);		
			return;
		}
		
		$thumbnails = explode("|", Input::get('thumbnail', ''));
		
		for($i = 0; $i < count($thumbnails); $i++ )
		{
			if( empty($thumbnails[$i]) )
				continue;
			
			$thumbnail = new Thumbnail;
			$thumbnail->thumbnail = $thumbnails[$i];
			$thumbnail->product_id = $product->id;
			
			$thumbnail->save();
		}
		
		$this->outputResult(SUCCESS, $product );				
	}
	
	private function deleteProduct2()
	{
		$this->deleteProduct();
	}
		
	private function uploadPicture()
	{
		if( Input::has('id') == false )
		{ 
			$this->outputResult(MISSING_PARAMETER);
			return;
		}
		
		$filekey = 'myfile';
		if(Input::hasFile($filekey) === false )
		{
			$this->outputResult( MISSING_PARAMETER );
			return;
		}
		
		
		$id = Input::get('id', '0');
		$user = User::checkValidity();
		if( empty($user) )
		{
			$this->outputResult(NO_PERMISSIONS);
			return;
		}
		if( $user->role != 1 )
		{
			$this->outputResult(UNKNOWN, "You are not seller");
			return;
		}
		
		if (Input::file($filekey)->isValid() === false )
		{
			$this->outputResult( INVALID_PARAMETER );
			return;
		}
		
		$file_name = $_FILES[$filekey]["name"];
	
		$ret = Input::file($filekey)->move("uploads/product/", $file_name);
		if( empty($ret) )
			$this->outputResult(SERVER_INTERNAL_ERROR, 'There was an error uploading your file.');
		
		$file_name = Request::root() . '/uploads/product/' . $file_name;
		
		$this->outputResult(SUCCESS, $file_name );
	}
	
	private function getproductdata()
	{
		$product1 = Product::where('type', '1')->get();
		$product2 = Product::where('type', '2')->get();
		
		foreach($product1 as $value)
		{
			$value->thumbnail;
		}
		
		foreach($product2 as $value)
		{
			$value->thumbnail;
		}
		
		$data = array();
		$data['product1'] = $product1;
		$data['product2'] = $product2;
		
		$this->outputResult(SUCCESS, $data );
	}
	
	private function outputResult( $retcode, $content = '', $error_msg = null )
	{
		// header('Content-type: application/json');

		if( $error_msg == null )
		{
			switch ($retcode)
			{
			case SUCCESS:
				$error_msg = '';
				break;
			case MISSING_PARAMETER:
				$error_msg = 'Parameter is missing';
				break;
			case INVALID_PARAMETER:
				$error_msg = 'Parameter is invalid';
				break;
			case USER_EXIST:
				$error_msg = 'User is already exist';
				break;
			case NO_USER_EXIST:
				$error_msg = 'User is not exist';
				break;
			case INVALID_PASSWORD:
				$error_msg = 'Your input password is not correct';
				break;
			case INVALID_VCODE:
				$error_msg = 'Verification code is invalid';
				break;
			case EXPIRED_VCODE:
				$error_msg = 'Verification code is expired';
				break;
			case STATUS_INACTIVE:
				$error_msg = 'You can not login, you are disabled by administrator';
				break;
			case NO_VERIFIED:
				$error_msg = 'You are not verified yet.';
				break;
			case NO_PERMISSIONS:
				$error_msg = 'You have no permission';
				break;
			case SERVER_INTERNAL_ERROR:
				$error_msg = 'Server internal process error.';
				break;
			default :
				$error_msg = $content;
				break;
			}
		}

		$response = array( 'retcode'=>$retcode, 'content'=>$content, 'error_msg'=>$error_msg );

		echo json_encode($response);		
	}
	
}
