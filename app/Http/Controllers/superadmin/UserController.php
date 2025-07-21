<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\CountrySettings;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
        $userlist = User::where('user_type', '!=',1)
            ->with(['subscription.method']) // eager load subscriptions and their methods
            ->get();

        return response()->json([
            'data' => $userlist
        ]);
    }
    
    
    
    public function userpost(Request $request)
{

   
    $userId = $request->input('id');

    $rules = [
        'name' => 'required|string|max:255',
        'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($userId)],
        'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
        'mobile' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($userId)],
        'country_code' => 'required|integer',
        'plan' => 'required|integer',
    ];

    $messages = [
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
    ];

    if ($userId) {
        // Update: Password is not required
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }
    } else {
        // Create: Password is required
        $rules['password'] = 'required|string|min:8|confirmed';
    }

    $request->validate($rules, $messages);

    try {
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'country_code' => $request->input('country_code'),
            'plan' => $request->input('plan'),
            'subtype' => $request->input('subtype'),
            'role' => 'admin',
            'user_type' => '2',
            'store_id' => '0',
            'mobile_code' => '0',
            'created_by' => auth()->user()->id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        if ($userId) {
            $user = User::findOrFail($userId);
            $user->update($data);
        } else {
            User::create($data);
        }

        return response()->json(['success' => true, 'message' => 'User data saved successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
    }
}


public function user_delete($id) {
    try {
        $user = User::findOrFail($id);
        $user->delete();
     
        return response()->json(['success' => 'user deleted successfully!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error deleting user'], 500);
    }
}

}
