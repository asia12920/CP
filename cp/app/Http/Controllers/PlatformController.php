<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CP\Interfaces\BackendRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\CP\Gateways\BackendGateway;
use Illuminate\Support\Facades\DB;

class PlatformController extends Controller
{
    public function __construct(BackendRepositoryInterface $bR, BackendGateway $bG)
    {
        $this->bR = $bR;
        $this->bG = $bG;
    }

    public function links()
    {
        return view('workers');
    }

    public function workers()
    {
        $users = $this->bR->getUsersForMainPage();
       
        return view('workhours',['users'=>$users]);
       
    }


    public function workersearch(Request $request)
    {
        $dayin = date('Y-m-d', strtotime($request->input('from'))); 
        $dayout = date('Y-m-d', strtotime($request->input('to'))); 
        if($request->input('from') && $request->input('to'))
        {
            $users = DB::table('users')
            ->join('hours', 'hours.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->whereDate('hours.date','>=' , $dayin)
            ->whereDate('hours.date','<=' , $dayout)
            ->orderBy('hours.date', 'desc')
            ->select('users.email','hours.user_id', 'hours.date', 'hours.hours')->get();
        }
        else 
        {
            $users = DB::table('users')
            ->join('hours', 'hours.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->orderBy('hours.date', 'desc')
            ->select('users.email','hours.user_id', 'hours.date', 'hours.hours')->get();
        }


        $workers = $this->bR->getUsersForMainPage();
        return view('workhours',['users'=>$users, 'workers'=>$workers]);
       

       
    }



    public function insertWorkersHours(Request $request)
    {
    
            $user = $this->bG->saveUser($request);

            return redirect('/admin/workhours')->with('hours', __('Godziny zostały dodane do bazy'));
     
    }




    public function searchsickleaves(Request $request)
    {

        
        $users = DB::table('users')
        ->join('sickleaves', 'sickleaves.user_id', '=', 'users.id')
        ->where('users.email', '=', $request->input('search') )
        ->select('users.email', 'sickleaves.date')->get();

        $workers = $this->bR->getUsersForMainPage();

        return view('sickleaves',['users'=>$users, 'workers'=>$workers]);
    }

    public function searchvacation(Request $request)
    {
        $dayin = date('Y-m-d', strtotime($request->input('from'))); 
        $dayout = date('Y-m-d', strtotime($request->input('to'))); 


        if($request->input('from') && $request->input('to'))
        {
            $users = DB::table('users')
            ->join('vacations', 'vacations.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->whereDate('vacations.date','>=' , $dayin)
            ->whereDate('vacations.date','<=' , $dayout)
            ->orderBy('vacations.date', 'desc')
            ->select('users.email','vacations.user_id', 'vacations.date')->get();

            $vacations = DB::table('users')
            ->join('hours', 'hours.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->whereDate('hours.date','>=' , $dayin)
            ->whereDate('hours.date','<=' , $dayout)
            ->select('users.email','hours.user_id', 'hours.date', 'hours.hours')->get();
        }
        else {
            $users = DB::table('users')
            ->join('vacations', 'vacations.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->orderBy('vacations.date', 'desc')
            ->select('users.email','vacations.user_id', 'vacations.date')->get();

            $vacations = DB::table('users')
            ->join('hours', 'hours.user_id', '=', 'users.id')
            ->where('users.email', '=', $request->input('search'))
            ->select('users.email','hours.user_id', 'hours.date', 'hours.hours')->get();
        }


   



        $workers = $this->bR->getUsersForMainPage();

        return view('vacation',['users'=>$users, 'vacations'=>$vacations, 'workers'=>$workers]);
     
    }

    public function insertVacation(Request $request)
    {
        $user = $this->bG->saveUserVacation($request);
        
        return redirect('/admin/vacation')->with('vacation', __('Urlop został dodany do bazy'));
    }

    public function insertSickleave (Request $request)
    {
        $user = $this->bG->saveUserSickleave($request);
        
        return redirect('/admin/sickleaves')->with('sickleave', __('Zwolnienie lekarskie zostało wprowadzone poprawnie'));
    }

    public function welcome()
    {
        return view('welcome');
    }



    

}