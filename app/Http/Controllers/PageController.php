<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    //
    public function index(){
        $userName = session('userName');

        DB::connection('mysql');
        $userData = DB::select('select * from membertable');

        return view('index',['userName'=>$userName, 'userData'=>$userData]);
    }

    //
    public function goToAddMember(){
        return view('addMember');
    }

    //
    public function goToDeleteMember(){
        return view('deleteMember');
    }

    //
    public function goToUpdateMember(){
        return view('updateMember');
    }


}
