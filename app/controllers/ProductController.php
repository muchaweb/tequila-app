<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /product
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$products = DB::table('products')
                        ->join('currencies','products.id_currency_fk','=','currencies.id','left')
                        ->join('labels','products.id_label_fk','=','labels.id','left')
                        ->join('bottles_size','products.id_size_fk','=','bottles_size.id','left')
                        ->join('images','products.id','=','images.id_product_fk','right')
                        ->select('products.id', 'products.product', 'products.description', 'products.price', 'products.active', 'products.ordering', 'currencies.prefix', 'labels.label','bottles_size.size', 'images.path_image')
                        ->orderBy('products.ordering', 'desc')
                        ->paginate(10);

        return View::make('admin.products.products')->with('products', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$labels   = Label::all()->lists('label', 'id');
        $combo_label = array(0 => "Seleccione") + $labels;
        $selected_label = array();

        $currencies   = Currency::all()->lists('prefix', 'id');
        $combo_currency = array(0 => "Seleccione") + $currencies;
        $selected_currency = array();

        $bottle_size   = BottleSize::all()->lists('size', 'id');
        $combo_size = array(0 => "Seleccione") + $bottle_size;
        $selected_size = array();

        return View::make('admin.products.products-new', compact('combo_label', 'selected_label','combo_size', 'selected_size','combo_currency', 'selected_currency'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Product::$rules, Product::$messages);

		if($validator->passes()) {		    
		    $product                   = new Product;

		    $product->product          = Input::get('product');
		    $product->price            = Input::get('price');
		    $product->id_currency_fk   = Input::get('currency');
		    $product->id_label_fk      = Input::get('label');
		    $product->id_size_fk       = Input::get('size');
		    $product->description      = Input::get('description');
		    $product->ordering         = 0;

		    $product->save();

			$id_last_product = $product->id;
			$image = Input::file('image');

			$product = 	Product::find($id_last_product);
			$name = $product->product;
			
			$fullname = strtolower(str_replace(" ", "_", $name))."_".$id_last_product.'.'.$image->getClientOriginalExtension();
			$upload = $image->move(('uploads'),$fullname);

			if($upload){
				$insert_id = DB::table('images')->insertGetId(array(
					'title' => $name,
					'path_image' => $fullname,
					'active' => 1,
					'ordering' => 0,
					'id_product_fk' => $id_last_product
					));

				return Redirect::route('product_add_new_form')
						        ->with('success', 'Producto registrado correctamente');

			}else{

				$id_product = Product::findOrFail($id);

		        if($id_product != ""){
		           $id_product->delete();
		        }

				return Redirect::route('product_add_new_form')
		                    ->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
			}

		} else {
		    return Redirect::route('product_add_new_form')
		                    ->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /product/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$products 		= 	Product::find($id);
		$labelID     	= 	$products->id_label_fk; 
		$currencyID  	= 	$products->id_currency_fk; 
		$sizeID  		= 	$products->id_size_fk; 

		//-- Label Search --
		$searchLabel 	= Label::find($labelID);
		$currentIDLabel = $searchLabel->id;
		$currentLabel 	= $searchLabel->label;

		$labels   		= Label::all()->lists('label', 'id');
		$combo_label 	= array($currentIDLabel => $currentLabel) + $labels;
		$selected_label = array();
		//-- End Label Search --
		
		//-- Currencies Search --
		$searchCurrency 	= Currency::find($currencyID);
		$currentIDCurrency 	= $searchCurrency->id;
		$currentCurrency 	= $searchCurrency->prefix;

		$currencies   		= Currency::all()->lists('prefix', 'id');
		$combo_currency 	= array($currentIDCurrency => $currentCurrency) + $currencies;
		$selected_currency 	= array();
		//-- End Currencies Search

		//-- Bottle Size Search --
		$searchBottleSize 		= BottleSize::find($sizeID);
		$currentIDBottleSize 	= $searchBottleSize->id;
		$currentBottleSize 		= $searchBottleSize->size;

		$bottle_size   	= BottleSize::all()->lists('size', 'id');
		$combo_size 	= array($currentIDBottleSize => $currentBottleSize) + $bottle_size;
		$selected_size 	= array();
		//-- End Bottle Size Search -- 

		return View::make('admin.products.products-edit', compact('combo_label', 'selected_label','combo_size', 'selected_size','combo_currency', 'selected_currency'))->with('products', $products);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Product::$rules_edit, Product::$messages);

		if($validator->passes()) {
		    $product           		   = Product::find($id);

		    $product->product          = Input::get('product');
		    $product->price            = Input::get('price');
		    $product->id_currency_fk   = Input::get('currency');
		    $product->id_label_fk      = Input::get('label');
		    $product->id_size_fk       = Input::get('size');
		    $product->description      = Input::get('description');

		    $product->save();

		    return Redirect::route('product_list')->with('success', 'Producto actualizado correctamente');

		} else {

		    return Redirect::to('/admin/products/edit/'.$id)
		                    ->with('error', 'Revise los siguientes errores')
		                    ->withErrors($validator)
		                    ->withInput();
		}
	}

	public function getActive()
	{
	    $id 		= Input::get('id');
	    $id_product = Product::findOrFail($id);

	    if($id_product != "") {
	        $id_product->active = $id_product->active ? false : true;
	        $id_product->save();
	    }
	    return Redirect::route('product_list');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id_product = Product::findOrFail($id);

        if($id_product != ""){
           $id_product->delete();
        }
        return Redirect::route('product_list')
                        ->with('success', 'Producto eliminado correctamente');
	}

}