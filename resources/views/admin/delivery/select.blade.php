@extends('admin.layouts.admin')

@section('title', "Delivery Management")

@section('content')
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                       
                <div class="right-searchbar">
                                <!-- Search form -->
                                
                        <a href="{{ route('admin.delivery.addin') }}" class="btn btn-primary">Add Delivery</a>
                            </div>
                            <a href="{{ route('admin.delivery.print') }}" class="btn btn-primary">Print Today Delivery</a>
                           
                            <a href="{{ route('admin.delivery.today') }}" class="btn btn-primary">Show Today Delivery</a>
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
                        <th>Print</th>
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
                                <td>
                                    @if($Deliver->print ==true)
                                    Print
                                    @else Not Print
                                    @endif
                                </td>  
                                <td> <a class="btn btn-xs btn-primary" href="{{ route('admin.delivery.show',[$Deliver->id]) }}">
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