@extends('admin.layouts.admin')

@section('title',"Add Item") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addinverty" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

        <div class="form-group">
            <label for="articleNo">Article No *</label>
            <input type="text" class="form-control" name="articleNo" id="articleNo" placeholder="Article No" value="{{ old('articleNo') }}">
        </div>
        <div class="form-group">
            <label for="color">Color *</label>
            <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="{{ old('color') }}">
        </div>
        <div class="form-group">
            <label for="collection">Collection *</label>
            <input type="text" class="form-control" name="collection" id="collection" placeholder="Collection" value="{{ old('collection') }}">
        </div>
        <div class="form-group">
            <label for="location">Location *</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location') }}">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
        </div>
       
        <a href="{{ route('admin.inverty') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.inverty.add') }}" class="btn btn-primary">Clear</a>
        <button type="submit" class="btn btn-primary">Add</button>
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