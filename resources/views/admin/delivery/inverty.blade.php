@extends('admin.layouts.admin')

@section('title', "Delivery Management")

@section('content')
<script>
        $(document).ready(function(){
        
        var $checkboxes = $('#count-form input[type="checkbox"]');
            
        $checkboxes.change(function(){
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
            
            var $selectcheck =  $('#count-checked-checkboxes').val(countCheckedCheckboxes);
            $("div#select h2").html("Some Text Here");
        });
        
        });
        </script>
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
         <tr>
                    <div class="demptable">
                      
                <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchInverty" method="post" class="form-inline">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                                    </div>
                                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                              </form>
                            </div>
                        
                    </div> 

                    
            </tr>
            </thead>
        </table>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        @endphp
               <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <form action="add" id="count-form" method="post" class="form-inline">
                        <div class="demptable">
                      
                                <div class="right-searchbar">
                                                <!-- Search form -->
                                                        {{ csrf_field() }}
                                                    <div class="form-group">
                                                            <input class="form-control"  id="count-checked-checkboxes" type="text" name="search"value="0" aria-label="Search" disabled required />
                                                        </div>
                                                    
                                            </div>
                                    </div>
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>articleNo</th>
                        <th>color</th>
                        <th>collection</th>
                        <th>location</th>
                        <th>Quantity</th>
                        <th>Select</th>
                    </tr>
                    </thead>
                    <tbody>
                            
                            @foreach($Invertys as $Inverty)
                            <tr>
                                <td>{{ $Inverty->articleNo }}</td>
                                <td>{{ $Inverty->color }}</td>
                                <td>{{ $Inverty->collection }}</td>
                                <td>{{  $Inverty->location  }}</td>
                                <td>{{ $Inverty->qty }}</td>  
                                <td>
                                        @if (($Inverty->qty)<=0)
                                        Quantity less than 0.
                                        @else
                                        
                               
                                    <input type="checkbox" name="Inventorycheckbox[]" value="{{ $Inverty->id }}"></td>  
                                </form>
                                @endif
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
                   <div class="demptable">
                <div class="form-group" align="right">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Add delivery</button>
                    </div>
                <div class="pull-right">
                </div>
            </div>
 
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}


@endsection