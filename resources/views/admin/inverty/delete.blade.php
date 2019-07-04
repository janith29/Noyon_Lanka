@extends('admin.layouts.admin')
@section('content')    
    <div id="myModal" class="modal fade in" style="display: block; margin-top: 160px; margin-left: 100px;">
        <div class="modal-dialog modal-confirm">
            @if ($inverty->qty <= 0)
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>				
                    <h4 class="modal-title">Are you sure?</h4>	
                    <a href="{{ route('admin.inverty') }}" class="close" data-dismiss="modal" aria-hidden="true">×</a>
                   
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete item Article No  "{{ $inverty->articleNo }} "with id {{ $inverty->id }}? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                        <a href="{{ route('admin.inverty') }}" class="btn btn-primary">Cancel</a>
                        <form action="deleteinverty" method="post">
                                {{ csrf_field() }}
                    <input type="hidden" id="id" name="id" value="{{ $inverty->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </div>
            </div>

            @else
            <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="fa fa-trash"></i>
                        </div>				
                        <h4 class="modal-title">Are you sure?</h4>	
                        <a href="{{ route('admin.inverty') }}" class="close" data-dismiss="modal" aria-hidden="true">×</a>
                       
                    </div>
                    <div class="modal-body">
                        <p>You can't delete this item Article No  "{{ $inverty->articleNo }} "with id {{ $inverty->id }}? This inverty Quantity grater than 0.</p>
                    </div>
                    <div class="modal-footer">
                            <a href="{{ route('admin.inverty') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            @endif
          

        </div>
    </div>
@endsection