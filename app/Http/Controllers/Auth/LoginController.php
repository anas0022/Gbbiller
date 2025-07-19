<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginpost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
   
            \Log::info('User Type Debug', [
                'user_type' => $user->user_type,
                'user_type_type' => gettype($user->user_type)
            ]);

      
            $userType = (string)$user->user_type;
            
            $response = [
                'success' => true,
                'redirect' => ''
            ];

            switch ($userType) {
                case "1":
                    $response['redirect'] = route('supper.home');
                    break;
                
                case "2":
                    if (empty($user->plan)) {
                        Auth::logout();
                        return response()->json([
                            'success' => false,
                            'message' => 'No plan assigned'
                        ]);
                    }

                    if ($this->hasActiveSubscription($user)) {
                        $response['redirect'] = route('home');
                    } else {
                        $response['redirect'] = route('expired');
                    }
                    break;
                
                default:
                    \Log::error('Unexpected User Type', [
                        'user_type' => $userType,
                        'user_id' => $user->id
                    ]);
                    Auth::logout();
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid user type: ' . $userType
                    ]);
            }

            return response()->json($response);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ]);
    } 
          
        
    
   
    

private function hasActiveSubscription($user)
{
  
    $subscription = \App\Models\Subscription::where('id', $user->plan)
        ->first();
        $userUpdatedAt = $user->updated_at;
  if (!$subscription) {
            return false;
        }
    $expirationDate = $userUpdatedAt->addDays($subscription->duration);


    return now()->lessThan($expirationDate);
}

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    
        return redirect('/'); 
    }
}
