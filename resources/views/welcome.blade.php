<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Noyon lanka</title>
<!--

Template 2090 Kinetic

http://www.tooplate.com/view/2090-kinetic

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="ct" id="t1">
          <div class="ct" id="t2">
            <div class="ct" id="t3">
              <div class="ct" id="t4">
                <section>  
                 <ul>
                   <a href="#t1"  ><li class="icon fa fa-home" id="uno" data-toggle="tooltip" title="Home!"></li></a>
				   
				   
				   @if (Route::has('login'))
				   @if (!Auth::check())
					   @if(config('auth.users.registration'))
						   {{-- <a href="{{ url('/register') }}">{{ __('views.welcome.register') }}</a> --}}
					   @endif
					   <li class="icon fa fa-sign-in " id="user_editUser_btn" data-toggle="tooltip" title="Login!"></li>
				   @else
					   @if(auth()->user()->usertype == 'administrator'){{--->hasRole('administrator')--}}
					   <li> <a href="{{ url('/admin') }}"><span class="icon fa fa-tachometer" data-toggle="tooltip" title="Dashboard!"></span></a></li>
					   @elseif(auth()->user()->usertype == 'member')
					   <li> <a href="{{ url('/member') }}"><span class="icon fa fa-tachometer" data-toggle="tooltip" title="Dashboard!"></span></a></li>
					   @endif
					   
					   <li  ><a href="{{ url('/logout') }}"><span class="icon fa fa-sign-out  " data-toggle="tooltip" title="Logout!"></span> </a></li>
				   @endif
			   @endif
                   {{-- <a href="#t3"><li class="icon fa fa-image" id="tres"></li></a>
                   <a href="#t4"><li class="icon fa fa-phone" id="cuatro"></li></a> --}}
				 </ul>
				 @if (!$errors->isEmpty())
					<div class="alert alert-danger" role="alert">
						"Login:  "{!! $errors->first() !!}
					</div>
				@endif
				
				 <div class="page" id="p1">
						<li class="icon fa fa-home"><span class="title">Welcome To</span><h4>Noyon lanka</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed varius neque non imperdiet auctor. Duis sit amet velit eu lorem sollicitudin sodales.</p><div class="primary-button"></div></li>   
					 </div>
                  
                  <p class="credit">Copyright &copy; 2019 NOYON LANKA 
                        
                        - Designed by <a href="http://www.noyon-dentelle.com" target="_parent">sadeepa</a></p>
                </section>
              </div>
            </div>
           </div>
          </div>
		  <div class="modal fade" id="exampleModal">
			<div class="modal-dialog">
			  <div class="modal-content">
			  
				
				
				<!-- Modal body -->
				
						<div class="col-xs-12 col-sm-12 col-lg-8">
								<div class="panel panel-primary">
										<div class="panel-heading ">
						<h2>Login form</h2>
						{{ Form::open(['route' => 'login']) }}
						  <div class="form-group">
							<label for="email">Email:</label>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
							placeholder="{{ __('views.auth.login.input_0') }}" required autofocus>
						</div>
						  <div class="form-group">
							<label for="pwd">Password:</label>
							<input id="password" type="password" class="form-control" name="password"
							placeholder="{{ __('views.auth.login.input_1') }}" required>
						</div>
						<div class="form-group">
							<input type="checkbox" onclick="myFunction()">Show Password
						</div>
						  <div class="checkbox">
							<label>
									<input type="checkbox"
									name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('views.auth.login.input_2') }}
							</label>

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
				<button class="btn btn-default submit" type="submit">{{ __('views.auth.login.action_0') }}</button>
				<a href="{{ route('/') }}" class="btn btn-danger">Cancel</a>
				<a style="background-color: yellow; "class="reset_pass" href="{{ route('password.request') }}">
					{{ __('views.auth.login.action_1') }}
				</a>
				{{ Form::close() }}
					  </div></div>
							</div>
				  
				</div>
				
				
				
			</div>
		  </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X','auto');ga('send','pageview');
			
			$('body').on('click', '#user_editUser_btn', function (event) {
   

    $('#exampleModal').modal('show');
});
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
        </script>
    </body>
</html>