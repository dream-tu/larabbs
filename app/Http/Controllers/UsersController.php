<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function show(User $user)
    {
       return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user)
    {
//        dd($request->avatar);
        $user->update($request->all());
        toast('个人资料更新成功！','success');
        return redirect()->route('users.show',$user->id);
    }
}
