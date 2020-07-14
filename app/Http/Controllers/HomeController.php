<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use Storage;
use App\Festival;
use App\Enums\UserEnum;
use App\Ticket;



class HomeController extends Controller 
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) 
        {
            
            if (!Auth::check()) 
            {
                return redirect("/");
            }
            else
            {
                return $next($request);
            }
        });
    }

	public function getHome(Request $request)
    {
    	$filters = $request->all();
    	$user=Auth::user();

    	if(isset($request->search))
    	{
			$festivals=Festival::where('name', 'like', '%'.$request->search.'%')->paginate(5);
        }
        else
        { 
			$festivals =Festival::paginate(5);
        }


        return view('home',
        	[
                "user" => $user,
                "festivals" => $festivals,
                "filters" => $filters,
            ]);
    }

	public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }


     public function getChangePassword()
    {
        $user=Auth::user();
        return view("change_password",
            [ 
            "user" => $user,
            ]
    );
    }

     public function postChangePassword(Request $request)
    {
          
              $rules = [
        'password' => [
            'required',
            'min:8',
            'confirmed',
        ],
    ];
    $validation = \Validator::make( $request->all(), $rules );
            $user= Auth::user();
    if ( $validation->fails() || !Hash::check($request->oldpsw, $user->password)) {
                $errors=[];
                 if( !Hash::check($request->oldpsw, $user->password)){
                        $errors["oldpassword_error"]= "old password is wrong";
                }
                if($validation->fails()){
                     $errors["error_response"]= $validation->errors()->all();
                }
               $data = $errors;
               $data["user"] = $user;  

        return view("change_password", $data);


    } else {
               
                $user->password = Hash::make($request->password);
                $user->save();

        return redirect("home");
          }

   
         }

       public function getDeleteFestival($id)
        {

            $festival = Festival::find($id);
            $user = Auth::user();
            if($user->role==2)
                    { 
                    $festival->delete();
                    }
         
         return redirect()->back();
        }


         public function getBuyTickets($id)
            {

                $user=Auth::user();
                $festival = Festival::where("id", $id)
                    ->first();


                return view("buy_tickets",
                    [ 
                        "user" => $user,
                        'festival_id' => $id,
                        'festival' => $festival,
                    ]
                );
            }

             public function postBuyTickets(Request $request, $id) 
            {
                           
                    $user=Auth::user();
                    $festival = Festival::find($id);
                     $rules = [
                    'card_number' => [
                        'required',
                        'digits_between:12,15',

                    ],
                    'CVC' => [
                        'required',
                        'digits_between:3,3',
                    ]
                ];
                 $validation = \Validator::make( $request->all(), $rules );

                if ( $validation->fails() ) {

                    return view("buy_tickets",                       
                        [
                            "error_response"=>  $validation->errors()->all(),
                            'user' => $user,
                            'festival_id' => $id,
                            'festival' => $festival,
                         ]
                    );
                     }
                    else

                $ticket = new Ticket();
                $ticket->name=$request->name;
                $ticket->surname=$request->surname;
                $ticket->address=$request->address;
                $ticket->card_number=$request->card_number;
                $ticket->quantity=$request->quantity;
                $ticket->CVC=$request->CVC;
                $ticket->festival_id=$id;

                


                $ticket->save();
                return redirect("/ticket/".$id);
            
             }


             public function getTicket($id)
            {

                $user=Auth::user();
                $festival = Festival::where("id", $id)
                    ->first();

                $ticket_number = time().str_random(6);


                return view("ticket",
                    [ 
                        "user" => $user,
                        'festival_id' => $id,
                        'festival' => $festival,
                        'ticket_number' => $ticket_number,
                    ]
                );
            }







}