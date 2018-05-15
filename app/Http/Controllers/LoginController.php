<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function postLogin(Request $request)
    {
        try
        {
            $rememberMe = false;

            if(isset($request->rememberMe))
                $rememberMe = true;

            if(Sentinel::authenticate($request->all(), $rememberMe))
            {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug == 'admin')
                {
                    return redirect('/admin');
                }
                else if($slug == 'operator')
                {
                    //$lodge = Lodge::find($lodge_id);
                    return redirect('/operator');
                }
            }
            else
            {
                return redirect()->back()->with(['error' => 'Wrong Credentials.']);
            }
        }
        catch (ThrottlingException $e)
        {
            $delay = $e=$e->getDelay();

            return redirect()->back()->with(['error' => 'You are banned for '.$delay.' seconds.']);
        }
        catch (NotActivatedException $e)
        {
            return redirect()->back()->with(['error' => 'Your account is not activated yet.']);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/')->with(['success','You have logout successfully.']);
    }
}
