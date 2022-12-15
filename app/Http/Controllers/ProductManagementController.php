<?php

namespace App\Http\Controllers;

use App\Models\ProductManagement;
use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_table = ProductManagement::all();
        return view('productmanagement.producttable', compact('product_table'));
    }

    public function showForm()
    {
        $category = ['Laptop', 'Desktop', 'TV', 'Fridge', 'Monitor', 'CPU'];
        return view('productmanagement.productform', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $image = $request->upload[0];
        $img_name = $request->upload[0]->getClientOriginalName();
        $image->storeAs('public/images', $img_name);

        ProductManagement::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'tags' => $request->tags,
            'product_image' => $img_name,
            'category' => $request->category,
            'uploade_by' => $request->session()->get('email'),
        ]);
        Toastr::success('Created new product successfully :)', 'Success');
        return redirect('product/table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductManagement  $productManagement
     * @return \Illuminate\Http\Response
     */
    public function show(ProductManagement $productManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductManagement  $productManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductManagement $productManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductManagement  $productManagement
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateRecord = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'tags' => $request->tags,
                'category' => $request->category,
            ];

            ProductManagement::where('id', $request->product_id)->update(
                $updateRecord
            );
            Toastr::success('Updated Product successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Product Update :)', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductManagement  $productManagement
     * @return \Illuminate\Http\Response
     */
    public function deleteRecord(Request $request)
    {
        try {
            ProductManagement::destroy($request->id);
            Toastr::success('Product deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Product delete fail :)', 'Error');
            return redirect()->back();
        }
    }
}
