@extends('layouts/master')
@section('title','CodersPeak Workhours')
@section('content')


<div class="main-body-content w-100 ets-pt ml-1">
    <div class="container ml-5">
        <div class="row">
            <form class="form-inline"  method="get" action="{{ route('workerSearch')}}">
                <label class="mr-4" for="fname">Wyszukaj godziny pracy pracownika:</label>
                <div class="form-group">
                    <input name="from" value="{{ old('from')}}" type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres od daty" id="from" >
                </div>
                <div class="form-group">
                    <input name="to" value="{{ old('to')}}"  type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres do daty"   id="to" >
                </div>
                <input required type="search" name="search" class="mr-2 form-control" data-toggle="tooltip" title="Email pracownika" id="search" placeholder="Email" value="{{ old('search')}}">
                <button type="submit" class="btn btn-primary">Wyszukaj</button>
                {{ csrf_field() }}
            </form>

            <table class="table table-dark mt-3">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Data</th>
                    <th scope="col">Godziny</th>
                    <th scope="col">Wypracowany urlop</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{$user->date}}</th>
                        <th>{{$user->hours}}</th>
                        <th>{{ round(2*($user->hours)/160,1) }}</th>    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p><h5>Wypracowane dni urlopowe:  {{ round((2*($users->sum('hours'))/160),1) }} dni</h5></p>
        <div class="row">
            <form method="post" action="{{ route('workerSearch')}}">
                @if(session('hours'))
                <p class="h5">{{ session('hours')}}</p>
                @endif


                <div class="form-group">
                    <label for="exampleInputPassword1">Pracownik</label>
                    <input name="email" class="form-control" placeholder="Email">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Godziny</label>
                  <input type="hours" name="hours" class="form-control" placeholder="Godziny">
                </div>
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Data</label>
                    <div class="col-10">
                    <input class="form-control" type="date" name="date" value="{{\Carbon\Carbon::now()->year}}" id="example-date-input">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
                {{ csrf_field() }}
              </form>

        </div>
    </div>
</div>
@endsection

