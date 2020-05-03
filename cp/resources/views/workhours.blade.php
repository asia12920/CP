@extends('layouts/master')
@section('title','CodersPeak Workhours')
@section('content')

<div class="main-body-content w-100 ets-pt ml-1">                                 
  <div class="row">
      <div class="col-lg-10 ">
          <div class="col-lg-12 ml-3 t1">
              <div class="row">
                  <div class="col-lg-12 col-md-12 search-form d-flex mx-auto my-auto mx-0">  
                      <form class="form-inline"  method="get" action="{{ route('workerSearch')}}">
                          <label class="mr-4" for="fname">Wyszukaj godziny pracy pracownika:</label>
                          <div class="form-group">
                              <input name="from" value="{{ old('from')}}" type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres od daty" id="from" >
                          </div>
                          <div class="form-group">
                              <input name="to" value="{{ old('to')}}"  type="date" class="form-control datepicker mr-2" data-toggle="tooltip" title="Zakres do daty"   id="to" >
                          </div>
                          <select name="search" class="form-control custom-select mr-3" id="search">
                              @foreach($workers as $worker)
                                  <option selected value="{{ $worker->email }}">{{ $worker->email }} {{ $worker->name }}</option>
                              @endforeach
                                  <option selected value="{{ old('search')}}">Wybierz pracownika</option>
                          </select>
                          <button type="submit" class="btn btn-primary search-btn">Wyszukaj</button>
                          {{ csrf_field() }}
                      </form>
                  </div>
                  <div class="col-lg-12 info-col mb-2">
                      <p><h5>Wypracowane dni urlopowe w zadanym okresie: {{ round((2*($users->sum('hours'))/160),1) }} dni</h5></p>
                  </div> 
                  <div class="col-lg-12 table-col">
                      <table class="table mt-1">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">DATA</th>
                              <th scope="col">GODZINY</th>
                              <th scope="col">WYPRACOWANY URLOP</th>
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
                  <div class="col-lg-12 table-col mb-2">
                      <div class="row">
                          <div class="col-lg-8">
                              <form method="post" class="mt-1" action="{{ route('workerSearch')}}">
                                @if(session('hours'))
                                <p class="h5">{{ session('hours')}}</p>
                                @endif
                                  <p>Formularz do wprowadzania godzin</p>
                                  <div class="form-group">
                                      <select name="email" class="form-control custom-select mr-3" id="email">
                                          @foreach($workers as $worker)
                                              <option selected value="{{ $worker->id }}">{{ $worker->email}} {{ $worker->name}}</option>
                                          @endforeach
                                              <option selected value="{{ old('search')}}">Wybierz pracownika</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Godziny</label>
                                    <input type="hours" name="hours" class="form-control" placeholder="Godziny">
                                  </div>
                                  <div class="form-group">
                                      <label for="example-date-input" class="col-2 col-form-label">Data</label>
                                      <input class="form-control" type="date" name="date" value="{{\Carbon\Carbon::now()->year}}" id="example-date-input">
                                  </div>
                                  <button type="submit" class="btn btn-primary mb-2">Zapisz</button>
                                  {{ csrf_field() }}
                                </form>
                          </div>
                          <div class="col-lg-4">
                              <img src="img/note.jpg" class="img-fluid mx-auto d-block" alt="IMG">
                          </div>
                      </div>
                  </div>              
                    <footer class="page-footer justify-content-center font-small mt-2 w-100">
                        <div class="footer-copyright mt-2 text-center">© {{\Carbon\Carbon::now()->year}} Copyright:
                            <a  href="https://coderspeak.com/"> ♥ Coders'Peak</a>
                        </div>
                    </footer>
              </div>
          </div>
      </div>
      <div class="col-lg-2 right_sidebar">
          <div class="col-lg-12 t2"></div>
      </div>
  </div>
</div>

@endsection