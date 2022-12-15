<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class StickerController extends Controller
{

    public function index()
    {
        $sticker_table = Sticker::all();
        return view ('stickermanagement.stickertable',compact('sticker_table'));
    }

    public function showForm()
    {
        $category = ['Laptop','Desktop','TV','Fridge','Monitor','CPU'];
        return view ('stickermanagement.stickerform',compact('category'));
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
        $img_name =  $request->upload[0]->getClientOriginalName();
        $image->storeAs('public/images', $img_name);

        Sticker::create([
            'name'      => $request->name,
            'price'    => $request->price,
            'description'     => $request->description,
            'tags' => $request->tags,
            'product_image' => $img_name,
            'category'=> $request->category,
            'uploade_by'  => $request->session()->get('email')
        ]);
        Toastr::success('Create new sticker successfully :)','Success');
        return redirect('sticker/table');
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

        // dd($request);

        DB::beginTransaction();
        try {
        
           $updateRecord = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'tags' => $request->tags,
                'category' => $request->category,
           ];

           Sticker::where("id", $request->product_id)->update($updateRecord);
           Toastr::success('Updated Sticker successfully :)','Success');
           DB::commit();
           return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Sticker Update :)','Error');
            return redirect()->back();
        }
    }

    public function deleteRecord(Request $request)
    {
        try {

            Sticker::destroy($request->id);
            Toastr::success('Sticker deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Sticker delete fail :)','Error');
            return redirect()->back();
        }
    }
}