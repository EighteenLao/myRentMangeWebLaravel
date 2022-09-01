<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //
    public function showLoginPage(){
        return view('login');
    }

    //
    public function login(Request $request){
        DB::connection('mysql');
        $userData = DB::select('select * from admintable where userName = ?', [$request->userName]);

        if(!isset($userData[0]->userName)){
            return view('login',['err'=>"使用者不存在"]);
        }
        elseif(password_verify($request->password, $userData[0]->password)){
            session(['userName' => $userData[0]->userName]);
            return redirect('/');
        }
        else{
            return view('login',['err'=>"密碼錯誤"]);
        }
    }

    //
    public function logout(){
        session()->forget('userName');
        session()->flush();
        return redirect('/');
    }



    //
    public function addMember(Request $request){
        if($request->roomId == NULL){
            $msg = '請輸入房客資料';
            return view('addMember',['msg'=> $msg]);
        }
        else{
            DB::connection('mysql');
            $userData = DB::select('select * from membertable where roomId=?', [$request->roomId]);

            if(isset($userData[0]->roomId)){
                $msg = '房間已有房客';
                return view('addMember',['msg'=> $msg]);
            }
            else{
                DB::insert('insert into membertable (roomId, name, id, phoneNumber, date) values (?, ?, ?, ?, ?)', [$request->roomId, $request->name, $request->id, $request->phoneNumber, $request->date]);
                $msg = '新增成功';
                return view('addMember',['msg'=> $msg]);
            }
        }
    }

    //
    function deleteMember(Request $request){
        if($request->roomId == NULL){
            $msg = '請輸入房號';
            return view('deleteMember',['msg'=> $msg]);
        }
        else{
            $deleted=DB::delete('delete from membertable where roomId = ?', [$request->roomId]);

            if($deleted == 0){
                $msg = '刪除失敗';
                return view('deleteMember',['msg'=> $msg]);
            }
            else{
                $msg = '刪除成功';
                return view('deleteMember',['msg'=> $msg]);
            }
        }
    }


    //
    public function updateMember(Request $request){
        if($request->roomId == NULL){
            $msg = '請選擇房號';
            return view('updateMember',['msg'=> $msg]);
        }
        else{
            switch($request->editItem){
                case 'name':
                    DB::update('update membertable set name = ? where roomId = ?', [$request->updateText, $request->roomId]);
                    break;
                case 'id':
                    DB::update('update membertable set id = ? where roomId = ?', [$request->updateText, $request->roomId]);
                    break;
                case 'phoneNumber':
                    DB::update('update membertable set phoneNumber = ? where roomId = ?', [$request->updateText, $request->roomId]);
                    break;
                case 'date':
                    DB::update('update membertable set date = ? where roomId = ?', [$request->updateText, $request->roomId]);
                    break;
            }
            $msg = '修改成功';
            return view('updateMember',['msg'=> $msg]);
        }
    }

    //
    public function exit(){
        return redirect('/');
    }



}
