<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public function index() {
        $userId = "5c2e016ac21df60e28000147";
        $query  = User::all();
        // map function
        $query->transform(function ($item,$key){
            return $item->count = '5c2e016ac21df60e28000147';
        });
        //return $query;
        $query->when('likes'=='likes',function ($q){
             return $q->where('store_id','5)c32f43ac79ee315c8a70fa5');
        });
       // return $query->get();
        //return $user;

        $user = User::with([
            'store.company.customers' => function ($query) {
                $query->where('id', '5c32f522c79ee315c8a71040');
            },
            'store.company.company_setting'
        ])->get();
        return $user;
    }
}
