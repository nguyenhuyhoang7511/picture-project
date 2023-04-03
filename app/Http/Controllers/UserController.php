<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function getUsersForAdmin(){
        $allUser = User::where('is_admin',0)->where('status',1)->get();
        return $this->sendResponse($allUser, 'Get all user success');
    }
    public function getUserForAdmin($id){
        $data = User::find($id);
        return $this->sendResponse($data, 'Get all with id success');        
    }
    public function blockUser($id)
    {
        $data = User::where('id',$id)->update([
            'status' => User::USER_BLOCK
        ]);
        return $this->sendResponse($data, 'Block user success ');        
    }
    public function removeUser($id)
    {
        $data = User::find($id)->delete();
        return $this->sendResponse($data, 'Remove user success ');        
    }
    public function profile()
    {
        $profile = User::where('id',auth()->user()->id)->get();
        return $this->sendResponse($profile, 'get profile for user');        
    }
}
