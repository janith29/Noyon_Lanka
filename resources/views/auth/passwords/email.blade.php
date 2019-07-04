@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1> Forgot password</h1>
    </div>
</div>
                <div class="container">
                            
                  @if(!empty($message))
                  <div class="panel panel-danger">
          
                          {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                          <div class="panel-heading"> <div class="col-12 col-lg-5">{{ $message}}</div>
                          <div  align="right"> .</a></div>
                      </div>
                      </div>
                      @endif
              <div class="row ">
                      
                      <div class="col-xs-12 col-sm-12 col-lg-4  ">
                              <div class="panel panel-warning">
                              </div></div>  
                  <div class="col-xs-12 col-sm-12 col-lg-8">
                          <div class="panel panel-primary">
                                  <div class="panel-heading ">
                  <h2>Reset password form</h2>
                  {{ Form::open(['route' => 'resetpass']) }}
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                      placeholder="{{ __('views.auth.login.input_0') }}" required autofocus>
                  </div>
                    
                    @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>

          @endif

          @if (!$errors->isEmpty())
              <div class="alert alert-danger" role="alert">
                  {!! $errors->first() !!}
              </div>
          @endif
          <button class="btn btn-default submit" type="submit">check email</button>
         
          {{ Form::close() }}
                </div></div>
                      </div>
              </div></div>
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