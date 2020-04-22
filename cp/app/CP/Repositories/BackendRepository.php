<?php
namespace App\CP\Repositories; /* Lecture 12 */
use App\CP\Interfaces\BackendRepositoryInterface;

use App\{User, Hour, Vacation}; /* Lecture 12 */
use GuzzleHttp\Psr7\Request;

class BackendRepository implements BackendRepositoryInterface {

    public function getUsersForMainPage()
    {
        return User::all();
    }

        
    public function getSearchResults(string $user)
    {
    //return Hour::with(['users'])->where('email', $users)->get() ?? false ;  //rezerwacje wyciagamy tu za pomocą eager loading i przefiltrujemy je w gatewayu; get zwaraca tablice dlatego lepszy first
        //return Hour::where('user_id', $request->get('search'))->get();
        return User::with('hours')->where('email', $user)->first() ?? false;
    }
    public function getUsers()
    {
        return User::orderBy('email','asc')->get();
    }


    public function saveUser($request)
    {

        $user = new Hour;
        $user->user_id = $request->input('email') ;
        $user->date = $request->input('date');
        $user->hours = $request->input('hours');
        $user->status = 0;
        $user->save();

        return $user;
    }

    public function saveUserVacation($request)
    {
        $user = new Vacation;
        $user->user_id = $request->input('email') ;
        $user->date = $request->input('date');
        $user->status = 0;
        $user->save();

        return $user;
    }

}