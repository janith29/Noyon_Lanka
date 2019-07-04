<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Inverty;

use App\Models\Delivery;

use Validator;
use Illuminate\Support\Facades\DB;
use App;
use PDF;
use File;
class DeliveryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Delivers = Delivery::all();
      
        return view('member.delivery.index', compact('Delivers'));
    }
    public function today()
    {
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');

        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
      
        return view('member.delivery.today', compact('Delivers'));
    }
    
    public function Selectdate(Request $request)
    {
        $Issue=$request->get('getdate');
        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
       
        return view('member.delivery.select', compact('Delivers'));
    }
    public function searchdelivery(Request $request)
    {
        $Delivers = DB::table('delivered')
        ->where('id', $request['search'])
        ->orWhere('refkey', 'like', '%' . $request['search'] . '%')
        ->orWhere('reqdate', 'like', '%' . $request['search'] . '%')
        ->orWhere('issudate', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('member.delivery.index', compact('Delivers'));
    }
    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

 
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
    public function show(Delivery $Delivery)
    {
        return view('member.delivery.show',['Delivery' => $Delivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        
        $view = \View::make('member.delivery.print1');
        $html = $view->render();
        $pdf = new PDF();
        $pdf::SetTitle('Print');
        $pdf::AddPage('P', 'A5');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output($Issue.'_print.pdf');
        
      }
      
}
