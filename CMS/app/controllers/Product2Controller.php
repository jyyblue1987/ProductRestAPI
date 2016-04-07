<?php

class Product2Controller extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// delete action
		$ids = Input::get('ids');
		if( !empty($ids) )
		{
			DB::table('product')->whereIn('id', $ids)->delete();		
			DB::table('thumbnail')->whereIn('product_id', $ids)->delete();				
			return Redirect::back()->withInput();				
		}

		$query = Product::where('type', '2')->sortable();
		
		$search = Input::get('search');
		if( !empty($search) )
		{
			$query->where(function($searchquery)
				{
					$search = '%' . Input::get('search') . '%';
					$searchquery->where('name', 'like', $search)
					 ->orWhere('desc', 'like', $search);
				});	
		}
					
		$pagesize = Input::get('pagesize');
		if( empty($pagesize) )
			$pagesize = 10;		
		
		$product = $query->paginate($pagesize);	
		
		Input::flashOnly('search');
		$type = 2;
				
		return View::make('product.list')->with('product', $product)											
											->with('pagesize',$pagesize)
											->with('type', $type);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = new Product();
		$product->type = 2;
		$thumbnail = "";

		return View::make('product.form')->with('product', $product)->with('thumbnail', $thumbnail)
			->with('type', '2');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = Product::create(Input::all());
		if( empty($product) )
		{
			$message = 'Internal Server error';
			return Redirect::back()
					->withErrors('message', $message)
					->withInput();
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
		
		$message = 'SUCCESS';	
		
		return Redirect::back()
						->withErrors([$message])
						->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);				
		return View::make('view')->with('product', $product);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);	
		$thumbnails = Thumbnail::where('product_id', $id)->get();
		
		$thumbnail = "";
		
		$i = 0;
		foreach($thumbnails as $value)
		{
			if( $i == 0 )
				$thumbnail = $value->thumbnail;
			else
				$thumbnail = $thumbnail . "|" . $value->thumbnail;			
			$i++;
		}
		
		return View::make('product.form')->with('product', $product)->with('thumbnail', $thumbnail);										
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::find($id);
			
		if (!$product->update(Input::all())) {
			return Redirect::back()
					->withErrors('message', $message)
					->withInput();
		}	
		
		Thumbnail::where('product_id', $id)->delete();
		
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
		
		
		$message = 'SUCCESS';
		
		
		return Redirect::back()
						->withErrors([$message])
						->withInput();		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();

		return Redirect::back();
		
	}


}
