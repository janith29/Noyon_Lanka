@extends('admin.layouts.admin')

@section('title',"Add a delivery") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="{{ route('admin.delivery.adddeliverynew') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        @php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $deliveres = DB::select('select * from delivered ORDER BY id DESC LIMIT 1');
        
        $lastid=null;
        foreach($deliveres as $deliveree)
        {
            $lastid=$deliveree->id;
        }

        
        $lastid=$lastid+1;
        $mytime =  Carbon::now();
        Carbon::setToStringFormat('Ymd');
        if($lastid<10)
        {
        $refkey=$mytime."0".$lastid;
        }
        else {
            $refkey=$mytime.$lastid;
        }
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        @endphp
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @php
        $count=count($request);
        @endphp

        
<div class="form-group">
        @for ($i = 0; $i < $count; $i++)
            @php
             $IDin=$request[$i];
        
             $invertys = DB::table('inverty')->where('id', $IDin)->get();
             foreach($invertys as $inverty)
                {
                    $articleNoDelvery=$inverty->articleNo;
                    $IDinve=$inverty->id;
                    $color=$inverty->color;
                }
            @endphp

        <label for="articleNo">Article No </label>
        <h2>{{$articleNoDelvery}}</h2>
        
        <label for="articleNo">Colour </label>
        <h2>{{$color}}</h2>
                <select class="form-control" style="width: 100px;" name="parity[]">
                    <option class="form-control"  disabled value="">Select</option>

        @for ($x = 0; $x < $count; $x++)
                    <option class="form-control"  value="{{$x+1}}">{{$x+1}}</option>

        @endfor
                  </select>
                <input type="hidden" name="IDinve[]" id="IDinve" value="{{ $IDinve }}" >
       
        @endfor
    </div>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <div class="form-group">
            <label for="articleNo">Reference No *</label>
            <h2>{{$refkey}}</h2>
        </div>
        <div class="form-group">
            <label for="articleNo">Issue date *</label>
            <h2>{{$Issue}}</h2>
        </div>
        <div class="container">
            <div class="form-group">
                <div class="form-group">
                    <label for="request_date">Request date*</label>
                    <input type="date" name="request_date" class="form-control" required/>
                </div>
            </div>
        </div>
        <div class="form-group">
                <label for="referenceby">Request by*</label>
                <input type="text" name="referenceby" class="form-control" id="referenceby" value="{{ old('referenceby') }}" placeholder="Request by" required>
        </div>
        <div class="form-group">
            <label for="premark">Remark (optional)</label>
            <textarea class="form-control" name="Remark" id="premark" cols="20" rows="05" placeholder="Premark">{{ old('premark') }}</textarea>
        </div>
         <input type="hidden" name="issue_date" id="issue_date" value="{{ $Issue }}" >
        <input type="hidden" name="refkey" id="refkey" value="{{ $refkey }}" >
        <a href="{{ route('admin.delivery') }}" class="btn btn-danger">Cancel</a>
        @if ( $articleNoDelvery!=null) 
        <button type="submit" class="btn btn-primary">Add</button>
        @endif
      </form>
    </div>

         
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection