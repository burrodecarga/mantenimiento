Route::get('product-list', 'ProductController@index');
 Route::get('product-list/{id}/edit', 'ProductController@edit');
 Route::post('product-list/store', 'ProductController@store');
 Route::get('product-list/delete/{id}', 'ProductController@destroy');


 public function index()
{
    if(request()->ajax()) {
        return datatables()->of(Product::select('*'))
        ->addColumn('action', 'DataTables.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    return view('list');
}

public function edit($id)
{
    $where = array('id' => $id);
    $product  = Product::where($where)->first();

    return Response::json($product);
}

public function destroy($id)
{
    $product = Product::where('id',$id)->delete();

    return Response::json($product);
}
