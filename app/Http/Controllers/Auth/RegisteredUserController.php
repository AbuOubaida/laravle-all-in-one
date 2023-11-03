<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\BDphoneNumber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'phone' => ['required', new BDphoneNumber, 'unique:'.User::class],
                'address_1' =>  ['sometimes','nullable','string'],
                'address_2' =>  ['sometimes','nullable','string'],
                'address_3' =>  ['sometimes','nullable','string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $userName = explode('@',$request->email);
            $user = User::create([
                'status' => 1,//1st time 1=active. But default is 0=inactive
                'user_name' => $userName[0],//the first potion of user email address
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'address_3' => $request->address_3,
                'password' => Hash::make($request->password),
            ]);
            $user->addRole('super-admin');//1st time role is super-admin but default is user
            event(new Registered($user));
            return back()->with(
                'response',
                [
                    'error'=>false,
                    'type'=>'success',
                    'message'=>['Account create successfully'],
                    'code'=>  200,
                ]
            )->withInput();
        }catch (\Throwable $exception)
        {
            return back()->with(
                'response',
                [
                    'error'=>true,
                    'type'=>'error',
                    'message'=>[$exception->getMessage()],
                    'code'=>$exception->getCode()
                ]
            )->withInput();
        }
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
    }
}
