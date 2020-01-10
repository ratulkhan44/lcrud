<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('pages.customer.create',compact('companies'));
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
            'name'=>'required|string',
            'email'=>'required|email',
            'company_id'=>'required|numeric',
            'status'=>'required|numeric',
            'image'=>'nullable||mimes:png,jpg,jpeg',
        ]);
        
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $file_name = $request->name . time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('assets/img/customer/' . $file_name);
            Image::make($photo)->resize(300, 280)->save($location);
        } else {
            $file_name = '';
        }

        $customer=Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'company_id'=>$request->company_id,
            'status'=>$request->status,
            'image'=>$file_name
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
