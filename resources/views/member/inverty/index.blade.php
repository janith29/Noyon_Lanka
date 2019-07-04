@extends('member.layouts.member')

@section('title', "Inventory Management")

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
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                    <thead> 
                    <tr>
                        <th>articleNo</th>
                        <th>color</th>
                        <th>collection</th>
                        <th>location</th>
                        <th>Quantity</th>
                        <th>Option</th>
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
                                <td> <a class="btn btn-xs btn-primary" href="{{ route('member.inverty.show',[$Inverty->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{-- <a class="btn btn-xs btn-info" href="{{  route('member.inverty.edit',[$Inverty->id]) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('member.inverty.delete',[$Inverty->id]) }}">
                                    <i class="fa fa-trash"></i>
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