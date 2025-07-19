<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\CountrySettings;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function useradd(){

        $subscription = Subscription::all();
               
        return view('supperadmin.users.adduser', compact('subscription'));
    }

    public function userlist(){
        $subscription = Subscription::with('method')->get();
        $country = CountrySettings::all();
        return view('supperadmin.users.userlist', compact('subscription', 'country'));
    }

    public function userlistget(){
        $userlist = User::where('role', '!=', 'admin')->get();
        return response()->json([
            'data' => $userlist
        ]);


    }
    
    
    
    public function userpost(Request $request)
{

   
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|string|max:255|unique:users,mobile',
        'country_code' => 'required|integer',
        'plan' => 'required|integer',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'name.required' => 'The name field is required.',
        'username.required' => 'The username field is required.',
        'email.required' => 'The email field is required.',
        'mobile.required' => 'The mobile field is required.',
        'country_code.required' => 'The country code field is required.',
        'plan.required' => 'The plan field is required.',
        'password.required' => 'The password field is required.',
        'password.confirmed' => 'The password confirmation does not match.',
        'email.unique' => 'The email has already been taken.',
        'username.unique' => 'The username has already been taken.',
        'mobile.unique' => 'The mobile has already been taken.',
    ]);

    try {
        $user_id = $request->input('id');

        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'country_code' => $request->input('country_code'),
            'plan' => $request->input('plan'),
            'password' => Hash::make($request->input('password')),
            'subtype' => $request->input('subtype'),
            'role' => 'admin',
            'user_type'=>'2',
            'store_id'=>'0',
        ];

        if ($user_id) {
            $user = User::findOrFail($user_id);
            $user->update($data);
        } else {
            User::create($data);
        }

        return response()->json(['success' => true, 'message' => 'Subscription created successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Subscription creation failed: ' . $e->getMessage()], 500);
    }
}

}
