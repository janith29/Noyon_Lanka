<!DOCTYPE html>
          <html>
                  <head>
                     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
           
           
            table.first {
                color: #fcfcfc;
                font-family: helvetica;
                font-size: 8pt;
                border-left: 3px solid rgb(243, 243, 243);
                border-right: 3px solid rgb(236, 233, 236);
                border-top: 3px solid rgb(230, 236, 230);
                border-bottom: 3px solid rgb(255, 252, 252);
                background-color: #ccffcc;
            }
            td {
                background-color: #000000;
            }
            
            .lowercase {
                text-transform: lowercase;
            }
            .uppercase {
                text-transform: uppercase;
            }
            .capitalize {
                text-transform: capitalize;
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
                   DB::table('delivered')
                    ->where('id', $delivered->id)
                    ->update(['print' => true]);
                  @endphp
                  @foreach($deliveredinves as $deliveredinve)
                  @php
                       $inveID=$deliveredinve->inveID;
                       $invertys = DB::table('inverty')->where('id', $inveID)->get();
                  @endphp
                     @foreach ($invertys as $inverty)
                     <table class="first">
                        <tr>
                         <td width="200" align="center"><b><h3>articleNo:- {{$inverty->articleNo}} -{{$inverty->color}}</h3></b></td>
                         <td width="5" align="center"><b>XXXX</b></td>
                         <td width="5" align="center"><b>XXXX</b></td>
                        </tr>
                        <tr>
                           <td width="5" align="center"></td>
                           <td width="200" align="center" ><br><br><br><br><br><b><h3>{{$refkey}}</h3></b></td>
                           <td width="5" align="center"></td>
                          </tr>
                       </table>
                       <br>
                         <br>
                     @endforeach
                  @endforeach
                @endforeach
                          
                  </body>
          </html>
          