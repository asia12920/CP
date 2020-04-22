@extends('layouts/master')
@section('title','CodersPeak Workhours')
@section('content')


<div class="main-body-content w-100 ets-pt ml-1">
    <div class="container">
        <div class="row">
            <form class="form-inline"  method="get" action="{{ route('sickleaves')}}">
                <label class="mr-4" for="fname">Wyszukaj dni na L4 pracownika:</label>
                <input type="search" name="search" class="mr-3 form-control" id="search" placeholder="Email" value="{{ old('search')}}">
                <button type="submit" class="btn btn-primary">Wyszukaj</button>
                {{ csrf_field() }}
            </form>
            @if(session('noworkers'))
                <p>{{ session('noworkers')}}</p>
            @endif

            <table class="table table-dark mt-3">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{$user->date}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

