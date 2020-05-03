<?php

namespace App\CP\Gateways;
use \App\CP\Interfaces\BackendRepositoryInterface;

class BackendGateway {

    use \Illuminate\Foundation\Validation\ValidatesRequests;
     
    public function __construct(BackendRepositoryInterface $bR ) 
    {
        $this->bR = $bR;
    }

    public function getSearchResults($request)
    {
        $request->flash();

        if($request->input('search')!=null)
        {
            $result = $this->bR->getSearchResults($request->input('search'));

            if($result)
            {
                return $result;
            }
        }

        return false;
    }
    

    public function saveUser($request)
    {

        return $this->bR->saveUser($request);
    }
    
    public function saveUserVacation($request)
    {
        return $this->bR->saveUserVacation($request);
    }

    public function saveUserSickleave($request)
    {
        return $this->bR->saveUserSickleave($request);
    }
    

}

