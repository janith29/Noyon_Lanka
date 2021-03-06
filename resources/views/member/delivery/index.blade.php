@extends('member.layouts.member')

@section('title', "Delivery Management")

@section('content')
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                            <a href="{{ route('member.delivery.print') }}" class="btn btn-primary">Print Today Delivery</a>
                            <a href="{{ route('member.delivery.today') }}" class="btn btn-primary">Show Today Delivery</a>
                <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchdelivery" method="post" class="form-inline">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                                    </div>
                                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                                </form>
                                <form action="Selectdate" method="post" class="form-inline">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                            <div class="form-group">
                                                    <input type="date" name="getdate" class="form-control" required/>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Show Select date Delivery</button>
                                    </div>
                                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                                </form>
                                <form action="Selectrange" method="post" class="form-inline">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                            <div class="form-group">
                                                    <input type="date" name="todate" class="form-control" required/>
                                                </div>  <div class="form-group">
                                                    <input type="date" name="fromdate" class="form-control" required/>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Show range date Delivery</button>
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
        @endphp
               <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Reference key</th>
                        <th>Request date</th>
                        <th>Issue date</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($Delivers as $Deliver)
                            <tr>
                                <td>{{ $Deliver->id }}</td>
                                <td>{{ $Deliver->refkey }}</td>
                                <td>{{ $Deliver->reqdate }}</td>
                                <td>{{  $Deliver->issudate  }}</td>
                                <td> <a class="btn btn-xs btn-primary" href="{{ route('member.delivery.show',[$Deliver->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                               {{-- @if ($Deliver->print==false )
                                   
                               
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.delivery.delete',[$Deliver->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endif --}}
                                {{-- <a class="btn btn-xs btn-info" href="{{  route('admin.delivery.print',[$Deliver->id]) }}">
                                        <i class="fa fa-print"></i>
                                    </a> --}}
                            </td>  
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
                <div class="pull-right">
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}


@endsection