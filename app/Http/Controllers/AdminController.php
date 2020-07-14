<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Validation\Rule;
use App\Enums\UserEnum;
use App\Festival;





class AdminController extends Controller 
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            
            if (!Auth::check()) 
            {
                return redirect("/");
            }
            else
            {
                $user=Auth::user();

                if($user->role==UserEnum::admin)
                {
                    return $next($request);
                }
                else 
                {
                    return redirect("/home");
                }
         }
        });
    }

    public function getAddFestival()
    {
        $user=Auth::user();

        return view("add_festival",
            [ 
                "user" => $user,
            ]
        );
    }

    public function postAddFestival(Request $request) 
    {
        $festival = new Festival();
        $festival->name=$request->name;
        $festival->organisator=$request->organisator;
        $festival->date=$request->date;
        $festival->url=$request->url;
        $festival->longitude=$request->longitude;
        $festival->latitude=$request->latitude;
        $festival->address=$request->address;
        $festival->price=$request->price;
        
        $festival->save();
        return redirect("/home");
    }


    public function getUsers()
    {
        $user=Auth::user();
        $users=User::all();

        return view('users',
        [
            "user" => $user,
            "users" => $users,

        ]

    );
    }
    public function getDeleteUser($id)
        {


            $user = User::where('id', $id)->first();
           
             
                 $user->delete();
            
        
            return redirect('/admin/users');
        }

         public function getEditFestival($id)

            {
                $user=Auth::user();

                $festival = Festival::where("id", $id)
                    ->first();


             return view("edit_festival",
                   [ 
                    "festival" =>$festival,
                    "user" => $user,

                    ]       

            );
            }
            public function postEditFestival($id, Request $request){

            $festival = Festival::where('id', $id)
                            ->first();
            $user=Auth::User();
             { 
                    $festival->name= $request->name;
                    $festival->organisator= $request->organisator;
                    $festival->date= $request->date;
                    $festival->url= $request->url;
                    $festival->longitude=$request->longitude;
                    $festival->latitude=$request->latitude;
                    $festival->price=$request->price;

                    $festival->save();
             }

            return redirect("/home");

        }

   

}
