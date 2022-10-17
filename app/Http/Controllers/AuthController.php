<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    function home(){

        return redirect('/');
    }

    function loginView()
    {
        
        if (auth()->user()) // to authenticate if user is on session or not
        {
            // $id = auth()->user()->employee_no;
            // // return $id;

            // $data = User::join('documents', 'documents.document_no', '=', 'users.employee_no')
            //             ->where('users.employee_no' , '=' ,$id)
            //             ->get(['documents.document_name']);

            // return redirect('/');
            return redirect('/');
        }
        else
        {
            return view("login");

        }

    }

    function registerView()
    {
        return view("register");

    }

    function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'email' => 'required|email',   // required and email format validation
            'name' => 'required',
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {

            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["name", "password"]))) {
                return redirect("/")->with('success', 'Login Successful');
            } else {
                return back()->withErrors( "Invalid credentials"); // auth fail redirect with error
            }
        }
    }

    public function addDocument(Request $request){
        // return $request;
        if (auth()->user()) // to authenticate if user is on session or not
        {    

            $id = auth()->user()->employee_no;

            return DB::table('documents')
                ->insert([
                    "document_no" => $id,
                    "obsolete_date" => $request->obsoleteDate,
                    "document_name" => $request->documentName,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ]);

        }    
    }

    public function editDocument(Request $id){
        // return $request;
        return DB::table('documents')->find($id->id);
    }

    public function delDocument(Request $request, $id){
        // return $request;

        return DB::table('documents')->where('id', $id)->delete();

    }

    function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'employee_no' => 'required',
            'email' => 'required|email|unique:users,email',   // required and email format validation
            'password' => 'required|min:8', // required and number field validation
            'confirm_password' => 'required|same:password',

        ]); // create the validations

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {

            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed, save new user in database
            $User = new User;
            $User->name = $request->name;
            $User->employee_no = $request->employee_no;
            $User->email = $request->email;
            $User->password = bcrypt($request->password);
            $User->save();

            return redirect("login")->with('success', 'You have successfully registered, Login to access your dashboard');
        }
    }
   // show dashboard
    function dashboard()
    {
        if (auth()->user()) // to authenticate if user is on session or not
        {
            // return redirect(route('home'));
            $id = auth()->user()->employee_no;
            // return $id;

            $data = User::join('documents', 'documents.document_no', '=', 'users.employee_no')
                        ->where('users.employee_no' , '=' ,$id)
                        ->get(['documents.*']);

                        // return view("layouts.app", ['auth_user' => Auth::user()->name ], compact('data'));

                        // return view('layouts.app')->with('auth_user',  auth()->user());
                        return view('layouts.app')
                        ->with('auth_user', auth()->user()->name)
                        ->with('auth_code', auth()->user()->employee_no)
                        ->with('auth_documents', $data);

                        // return view('index', [ 'auth_user' => Auth::user() ]);
        }
        else
        {
            // return redirect(route('login'));
                        // return view("dashboard");
                        // return view("login");     
                        return redirect('/login');   
        }

        // return $data;

        // $data = Auth::id();
        //  $data = Auth::user()->id;

        // if (Auth::check())
        //     {
        //         $data = Auth::user()->id;
        //     }
        // $data = auth()->user()->id;
        

        // return $data;

        // $data = User::join('state', 'state.country_id', '=', 'country.country_id')
        //       		->join('city', 'city.state_id', '=', 'state.state_id')
        //       		->get(['country.country_name', 'state.state_name', 'city.city_name']);
                   
       	/*Above code will produce following query

        Select 
        	`country`.`country_name`, 
        	`state`.`state_name`, 
        	`city`.`city_name` 
        from `country` 
        inner join `state` 
        	on `state`.`country_id` = `country`.`country_id` 
        inner join `city` 
        	on `city`.`state_id` = `state`.`state_id`

        */
  
        // return view("dashboard", compact('data'));

    }

    // logout method to clear the sesson of logged in user
    function logout()
    {
        \Auth::logout();
        return redirect("login")->with('success', 'Logout successfully');
    }

}