<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Inverty;

use Validator;
use Illuminate\Support\Facades\DB;

use File;
class InvertyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invertys = Inverty::all();
      
        return view('admin.inverty.index', compact('Invertys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inverty.add');
    }

    
    public function searchInverty(Request $request)
    {
        $Invertys = DB::table('inverty')
        ->where('id', $request['search'])
        ->orWhere('articleNo', 'like', '%' . $request['search'] . '%')
        ->orWhere('color', 'like', '%' . $request['search'] . '%')
        ->orWhere('collection', 'like', '%' . $request['search'] . '%')
        ->orWhere('location', 'like', '%' . $request['search'] . '%')
        ->orWhere('qty', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.inverty.index', compact('Invertys'));
    }


    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Inverty $Invertyda)
    {
         $invertys = DB::table('inverty')->where('articleNo', $request['articleNo'])->get();
           
        $ArticleNo="panding";
        foreach($invertys as $inverty)
        {
            $ArticleNo=$inverty->articleNo;
        }
        
        if($ArticleNo==$request['articleNo'])
        {
            $message = 'This Article No is use. Article No is '.$ArticleNo;
            return redirect()->back()->with('message', $message);
               
        }
        $validatedData = [
            'articleNo' => 'required',
            'quantity' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9][0-9]?)?$/',
            'color' => 'required',
            'collection' => 'required',
            'location' => 'required'
        ];
        $customMessages = [
            'articleNo.required' => 'Article No must be required',
            'quantity.regex' => 'Inverty quantity must be double value(with 4)',
            'color.required' =>  'Inverty color must be required',
            'collection.required' =>  'Inverty collection must be required',
            'location.required' =>  'Inverty location must be required'
        ];
        $this->validate($request, $validatedData, $customMessages);

        $Invertyda->articleNo=$request->get('articleNo');
        $Invertyda->qty=$request->get('quantity');
        $Invertyda->color=$request->get('color');
        $Invertyda->collection=$request->get('collection');
        $Invertyda->location=$request->get('location');
        $Invertyda->save();

        return view('admin.inverty.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inverty $inverty)
    {
        return view('admin.inverty.show',['inverty' => $inverty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inverty $inverty)
    {
        return view('admin.inverty.edit',['inverty' => $inverty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Inverty $inverty)
    {

        $validatedData = [
            'quantity' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9][0-9]?)?$/',
            'color' => 'required',
            'collection' => 'required',
            'location' => 'required'
        ];
        $customMessages = [
            'quantity.regex' => 'Inverty quantity must be double value(with 4)',
            'color.required' =>  'Inverty color must be required',
            'collection.required' =>  'Inverty collection must be required',
            'location.required' =>  'Inverty location must be required'
        ];
        $this->validate($request, $validatedData, $customMessages);

        $invertys = DB::table('inverty')->where('id', $request['id'])->get();
           
        $ArticleQty="panding";
        foreach($invertys as $inverty)
        {
            $ArticleQty=$inverty->qty;
        }
        if($ArticleQty > $request['quantity'])
        {
            $message = 'You cannot reduce quantity';
            return redirect()->back()->with('message', $message);
               
        }

        DB::table('inverty')
        ->where('id', $request['id'])
        ->update(['qty' => $request['quantity'],'color' => $request['color'],'collection' => $request['collection'],'location' => $request['location']]);
    
        return view('admin.inverty.success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response Request $request,Book $book
     */
    public function destroy(Inverty $inverty)
    {
        return view('admin.inverty.delete',['inverty' => $inverty]);
    }
    public function sedelete(Request $request)//Request $request, Employee $employee
    {
        DB::table('inverty')->where('id', $request['id'])->delete();
         return view('admin.inverty.success');
    }
}
