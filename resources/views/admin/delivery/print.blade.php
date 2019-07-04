<!DOCTYPE html>
          <html>
                  <head>
                     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
                
                div.print {
                  
                  margin: auto;
                  border: 3px solid #73AD21;
                  background-color:black;
                  box-sizing: border-box; 
                   border: solid 2px white;
                   display:block
                }
                </style>
                  </head>
                  <body>
                      @php
                          
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');

        $delivereds = DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue' AND `print`=false");
        $refkey=null;
        $articleNo=null;
        $color=null;
                 @endphp
                 @if ($delivereds==null)
                    
                 <div class="alert alert-danger">
                        <strong>Not print yet!</strong> 
                      </div>
                 @endif
                  @foreach ($delivereds as $delivered)
                  @php
                  $refkey=$delivered->refkey;
                  $Did=$delivered->id;
                  $inveID=null;
                  $deliveredinves = DB::table('deliveredinve')->where('deliID', $Did)->get();
                   // DB::table('delivered')
                  //   ->where('id', $delivered->id)
                  //   ->update(['print' => true]);
                  @endphp
                  @foreach($deliveredinves as $deliveredinve)
                  @php
                       $inveID=$deliveredinve->inveID;
                       $invertys = DB::table('inverty')->where('id', $inveID)->get();
                  @endphp
                     @foreach ($invertys as $inverty)
                     <div class="print col-sm-3" >
                        <p style="color:white;"> articleNo:- {{$inverty->articleNo}} -{{$inverty->color}}</p>
                        <br><br><br><br>
                        <p style="color:white;">{{$refkey}}</p> 
                       </div>
                     @endforeach
                  @endforeach
                @endforeach
                          
                  </body>
          </html>
          