@extends('admin.layouts.admin')

@section('title',"Inventory Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateinverty" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
    
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
        <div class="form-group">
        <h3>Article No: {{$inverty->articleNo}}</h3>
        </div>
        <div class="form-group">
            <label for="color">Color *</label>
            <input type="text" class="form-control" name="color" id="color" value="{{ $inverty->color }}">
        </div>
        <div class="form-group">
            <label for="collection">Collection *</label>
            <input type="text" class="form-control" name="collection" id="collection"  value="{{ $inverty->collection }}">
        </div>
        <div class="form-group">
            <label for="location">Location *</label>
            <input type="text" class="form-control" name="location" id="location" value="{{ $inverty->location }}">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $inverty->qty }}">
        </div>
        <input type="hidden" id="id" name="id" value="{{ $inverty->id }}">
        <a href="{{ route('admin.inverty') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
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