<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\purchase;
use Auth;
use Session;
use App\Cart;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'measurement'=>'required',
            'gender'=>'required',
            'size'=>'nullable',
            'age_group'=>'nullable',
            'image'=>'required|max:1990'
        ]);
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/purchase', $fileNameToStore);
        }
        $purchase = new Purchase;

        $purchase->measurement=$request->measurement;
        $purchase->gender=$request->gender;
        $purchase->size=$request->size;
        $purchase->age_group=$request->age_group;
        $purchase->image=$fileNameToStore;

        Auth::user()->purchase()->save($purchase);

        Session::flash('success','Checkout Your Design');
        return redirect()->route('purchases.show',$purchase->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('purchase.show')->withPurchase($purchase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase= Purchase::find($id);
        $purchase->delete();

        Session::flash('success','Deleted Successfully');
        return redirect()->route('products.index');
    }
}
