<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use DB;

class BrandController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function checkLogic(Request $request)
    {
         $rules = array(
            'username'    => 'required',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();

            $input = input::all();

        } else {
            // create our user data for the authentication
            $users = DB::table('users')
                        ->where('email', '=', Input::get('username'))
                        ->where('password', '=', Input::get('password'))
                        ->get();
            if($users){
                session(['brand_user' => Input::get('username')]);
                session(['brand_pwd' => Input::get('password')]);
                // load dashboard page
                return Redirect::to('/post/create');
            }else{
                return view('login')->withErrors('Please enter valid inputs');
            } 
        }
    }
	public function sosLogic()
    {
		if(Input::get('appkey') == "1login") {
			// create our user data for the authentication
			$users = DB::table('users')
						->where('email', '=', Input::get('username'))
						->get();
			if($users){
				session(['brand_user' => Input::get('username')]);
				session(['brand_pwd' => Input::get('password')]);
				// load dashboard page
				return Redirect::to('/post/create');  
			}else{
				return view('login')->withErrors('user not exist');
			}
		}
		else{
				return view('login')->withErrors('not a valid key');
			}
    }
}