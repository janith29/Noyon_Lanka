<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Inverty;

use App\Models\Delivery;

use App\Models\DeliveryIn;

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
      
        return view('admin.delivery.index', compact('Delivers'));
    }
    public function today()
    {
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');

        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
      
        return view('admin.delivery.today', compact('Delivers'));
    }
    
    public function searchdelivery(Request $request)
    {
        $Delivers = DB::table('delivered')
        ->where('id', $request['search'])
        ->orWhere('refkey', 'like', '%' . $request['search'] . '%')
        ->orWhere('reqdate', 'like', '%' . $request['search'] . '%')
        ->orWhere('issudate', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.delivery.index', compact('Delivers'));
    }
    public function Selectdate(Request $request)
    {
        $Issue=$request->get('getdate');
        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
       
        return view('admin.delivery.select', compact('Delivers'));
    }
    public function Selectrange(Request $request)
    {
       
        $todate=$request->get('todate');
        $fromdate=$request->get('fromdate');

        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) BETWEEN ' $todate' AND ' $fromdate'");
       
        return view('admin.delivery.select', compact('Delivers'));
    }
    
    /**  
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function find()
    { 
        $Invertys = Inverty::all();
      
        return view('admin.delivery.inverty', compact('Invertys'));
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
        return view('admin.delivery.inverty', compact('Invertys'));
    }

    public function create(Request $request,Inverty $delivery)
    {
        return view('admin.delivery.add',['request' => $request->get('Inventorycheckbox')]);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Delivery $Delivery,DeliveryIn $DeliveryIn)
    {
        $premark=null;
        if($request->get('premark')==null)
        {
            $premark="No Remark";
        }
        else{
            $premark=$request->get('premark');
        }
        $Delivery->refkey=$request->get('refkey');
        $Delivery->reqdate=$request->get('request_date');
        $Delivery->issudate=$request->get('issue_date');
        $Delivery->referenceby=$request->get('referenceby');
        $Delivery->premark=$premark;
        $Delivery->print=false;
        $Delivery->save();

        $count=count($request->get('IDinve'));
        $inventDE=$request->get('IDinve');
        $deliveres = DB::select('select * from delivered ORDER BY id DESC LIMIT 1');
        
        $lastid=null;
        foreach($deliveres as $deliveree)
        {
            $lastid=$deliveree->id;
        }
        for ($i = 0; $i < $count; $i++)
        {
            $IDin=$inventDE[$i];

            $Issue=Carbon::now();
            DB::table('deliveredinve')->insert(
                ['inveID' => $IDin, 'deliID' => $lastid, 'created_at' => $Issue, 'updated_at' => $Issue]
            );

            $invertys = DB::table('inverty')->where('id', $IDin)->get();
            foreach($invertys as $inverty)
            {
                 $invertyCount=$inverty->qty;
            }
            $invertyCount=$invertyCount-0.5;
            DB::table('inverty')
            ->where('id', $IDin)
            ->update(['qty' => $invertyCount]);
        }
        
        $Invertys = Inverty::all();
      
        return view('admin.delivery.inverty', compact('Invertys'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $Delivery)
    {
        return view('admin.delivery.show',['Delivery' => $Delivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Delivery $Delivery)
    {
        return view('admin.delivery.delete',['Delivery' => $Delivery]);
    }
    public function sedelete(Request $request)
    {
        DB::table('delivered')->where('id', $request['id'])->delete();
         return view('admin.delivery.success');
    }
    public function print()
    {
        // return view('admin.delivery.print1');
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        
        $view = \View::make('admin.delivery.print1');
        $html = $view->render();
        $pdf = new PDF();
        $pdf::SetTitle('Print');
        $pdf::AddPage('P', 'A5');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output($Issue.'_print.pdf');
        
      }
      

}
