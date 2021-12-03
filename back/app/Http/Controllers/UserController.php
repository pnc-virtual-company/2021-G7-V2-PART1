<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllUser()
    {
        return User::latest()->get();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:1|max:45',
            'last_name'=> 'required|min:1|max:45',
            'email'=> 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone_number'=> 'required|min:9',
            'password'=> 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name =$request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'user'=>$user,
          
        ]);
    }

    /**
     * Login user resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password))  {
            return response()->json(['message' => 'Not good way to login'], 401);
        }

        return response()->json([
            'user'=> $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getUserId($id)
    {
        //
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateUser(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name =$request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'User Update Successfully!'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteUser($id)
    {
        
        $iSDelete = User::destroy($id);
        if ($iSDelete ===1) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User cannot delete'], 404);
        }
    }

}
