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
                font-size: 6pt;
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
                  $deliveredinves = DB::table('deliveredinve')->where('deliID', $Did)->orderBy('accd', 'ASC')->get()->get();
                   DB::table('delivered')
                    ->where('id', $delivered->id)
                    ->update(['print' => true]);
                  @endphp
                  
                 
                     
                     <table class="first" >
                        <tr>
                                <td width="90" height="115"><b>
                            @foreach ($deliveredinves as $deliveredinve)
                            @php

                                $inveID=$deliveredinve->inveID;
                                $invertys = DB::table('inverty')->where('id', $inveID)->get();
                            foreach($invertys as $inverty)
                            {
                                $articleNo=$inverty->articleNo;
                                $color=$inverty->color;
                              }
                            @endphp
                                <h3>articleNo:-{{$articleNo}} </h3>
                            @endforeach
                        </b></td>
                        <td width="80" ><b>
                            @foreach ($deliveredinves as $deliveredinve)
                            @php

                                $inveID=$deliveredinve->inveID;
                                $invertys = DB::table('inverty')->where('id', $inveID)->get();
                            foreach($invertys as $inverty)
                            {
                                $articleNo=$inverty->articleNo;
                                $color=$inverty->color;
                              }
                            @endphp
                                <h3>-{{$color}}</h3>
                            @endforeach
                        </b></td>
                        </tr>
                        <tr>
                           <td width="170" ><b><h3>{{$refkey}}</h3></b></td>
                          </tr>
                       </table>
                       <br>
                         <br>
                  @endforeach
                          
                  </body>
          </html>
          