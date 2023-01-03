<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_table = Category::all();
        return view('categorymanagement.categorytable',compact('category_table'));
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
       

            Category::create([
            'name' => $request->name,
            'type' => $request->type,
          
        ]);
        Toastr::success('Created new category successfully :)', 'Success');
        return redirect('category/table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $category = ['Laptop', 'Desktop', 'TV', 'Fridge', 'Monitor', 'CPU'];
        return view('categorymanagement.categoryform', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateRecord = [
                'name' => $request->name,
                'type' => $request->type,
            ];

            Category::where('id', $request->product_id)->update(
                $updateRecord
            );
            Toastr::success('Updated Category successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Category Update :)', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function deleteRecord(Request $request)
    {
        try {
            Category::destroy($request->id);
            Toastr::success('Product deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Product delete fail :)', 'Error');
            return redirect()->back();
        }
    }
}
