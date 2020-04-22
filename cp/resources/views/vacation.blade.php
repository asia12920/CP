@extends('layouts/master')
@section('title','CodersPeak Workhours')
@section('content')


<div class="main-body-content w-100 ets-pt ml-1">
    <div class="container">
        <div class="row">
            <form class="form-inline"  method="get" action="{{ route('vacation')}}">
                <label class="mr-4" for="fname">Wyszukaj dni urlopowe pracownika:</label>
                <div class="form-group">
                    <input name="from" value="{{ old('from')}}" type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres od daty" id="from" >
                </div>
                <div class="form-group">
                    <input name="to" value="{{ old('to')}}"  type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres do daty"   id="to" >
                </div>
                <input required type="search" name="search" class="mr-3 form-control" id="search" placeholder="Email" value="{{ old('search')}}">
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
                    <th scope="col">Data urlopu</th>
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
        <p><h5>Suma wszystkich wypracowanych dni urlopowych:  {{ round((2*($vacations->sum('hours'))/160),1) }} dni</h5></p>
        <p><h5>Suma wykorzystanych dni urlopowych: ... dni</h5></p>
        <p><h5>Suma dni urlopowych do wykorzystania: ... dni</h5></p>
        <div class="row">
            <form method="post" action="{{ route('vacation')}}">
                @if(session('vacation'))
                <p class="h5">{{ session('vacation')}}</p>
                @endif


                <div class="form-group">
                    <select name="email" class="form-control-lg" id="email">
                        @foreach($users as $user)
                        <option selected value="{{ $user->user_id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                    
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

