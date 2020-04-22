<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://bootswatch.com/3/readable/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!------ Include the above in your HEAD tag ---------->
    <title>@yield('title','CodersPeak')</title>
  </head>

  <body>
	 
  <div id="page-container" class="main-admin">
	  	<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
		  <a class="navbar-brand" href="#"></a>
		  <div id="open-menu" class="menu-bar">
		  	<div class="bars"></div>
		  </div>
		    <ul class="navbar-nav ml-auto">
				<a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
				</a>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form></li>
		    </ul>
		</nav>
	  	<div class="side-bar">
	  		<div class="side-bar-links">
	  			<ul class="navbar-nav">
	  				<li class="nav-item">
	  					<a href="" class="nav-links d-block"><i class="fa fa-users pr-2"></i> Pracownicy</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="" class="nav-links d-block"><i class="fa fa-list pr-2"></i> Urlopy</a>
					</li>
					<li class="nav-item">
					<a href="{{ route('sickleaves')}}" class="nav-links d-block"><i class="fa fa-sticky-note-o pr-2"></i> Zwolnienia L4</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> Powrót</a>
					</li>
	  			</ul>
	  		</div>
	  		<div class="side-bar-icons">
	  			<div class="icons d-flex flex-column align-items-center">
	  				<a href="{{route('workerSearch')}}" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
	  				<a href="{{route('vacation')}}" class="set-width text-center display-inline-block my-1"><i class="fa fa-list"></i></a>
				  <a href="{{route('sickleaves')}}" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
				  <a href="{{route('workers')}}" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
	  			</div>
	  		</div>
	  	</div>
  		@yield('content')
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		jQuery("#open-menu").click(function(){
    			if(jQuery('#page-container').hasClass('show-menu')){
    			jQuery("#page-container").removeClass('show-menu');
    		}
    			
    			else{
    			jQuery("#page-container").addClass('show-menu');
    			}
    		});
    	});
    </script>
  </body>
</html>