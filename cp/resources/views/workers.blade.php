@extends('layouts/master')
@section('title','CodersPeak Urlopy')
@section('content')

<div class="main-body-content w-100 ets-pt ml-1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
				@auth
				<form method="get" action="{{route('workerSearch')}}">
					<button class="btn btn-primary" type="submit">Workhours</button>
				</form>
				<form method="get" action="{{route('vacation')}}">
					<button class="btn btn-primary" type="submit">Vacations</button>
				</form>
				<form method="get" action="{{route('sickleaves')}}">
					<button class="btn btn-primary" type="submit">Sickleaves</button>
				</form>
			
				@endauth
			
		
@endsection


