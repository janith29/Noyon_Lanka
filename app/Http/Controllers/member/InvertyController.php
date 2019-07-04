<?php

namespace App\Http\Controllers\member;

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
      
        return view('member.inverty.index', compact('Invertys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
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
        return view('member.inverty.index', compact('Invertys'));
    }


    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inverty $inverty)
    {
        return view('member.inverty.show',['inverty' => $inverty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response Request $request,Book $book
     */
   
}
