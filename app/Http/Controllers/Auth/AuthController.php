<?php
 
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Auth;
 
class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $email = $request['email'];
        $pass = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            $user = User::where('email', $request['email'])->first();
            Auth::login($user, $request['remember']);

            return ['logged_in' => true];
        }
 
        return ['logged_in' => false];
    }

    public function register(Request $request){

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => false,
        ]);

        if(User::all()->count() == 1){
            $user->is_admin = true;
            $user->save();
        }

        Profile::create([
            'university_name' => "",
            'description' => "",
            'user_id' => $user->id
        ]);

        Auth::login($user, true);
        return ['logged_in' => true];
    }
}