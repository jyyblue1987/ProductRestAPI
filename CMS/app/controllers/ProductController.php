<?php

class ProductController extends BaseController {

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
			return Redirect::back()->withInput();				
		}

		$query = Product::sortable();
		
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
				
		return View::make('product.list')->with('product', $product)											
											->with('pagesize',$pagesize);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = new Category();

		$product->state_id = 0;
		$product->thumbnail = "default_thumbnail.jpg";
	
		return View::make('product.form')->with('product', $product);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = Category::create(Input::all());
		if( empty($product) )
		{
			$message = 'Internal Server error';
			return Redirect::back()
					->withErrors('message', $message)
					->withInput();
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
		$product = Category::find($id);				
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
		$product = Category::find($id);	
		
		return View::make('product.form')->with('product', $product);										
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Category::find($id);
			
		if (!$product->update(Input::all())) {
			return Redirect::back()
					->withErrors('message', $message)
					->withInput();
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
		$product = Category::find($id);
		$product->delete();

		return Redirect::back();
		
	}


}
