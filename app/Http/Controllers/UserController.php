<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Category;
use App\Dish;
use Session;
use Auth;
use Mail;
use Socialite;


class UserController extends Controller
{
    public function registration_page()
    {
        $category = Category::all();
        return view('frontend.registration',compact('category'));
    }
   
    public function registration(Request $a)
    {
    	// echo '<pre>';
    	// print_r($a->all());
        $email = User::where('email',$a->email)->count();
        if($email!=0)
        {
            return redirect()->back()->with('error_code', 5);
        }
        else
        {
    	$data = new User;
    	$data->name = $a->name;
        $data->email = $a->email;
        $data->address = $a->address;
        $data->city = $a->city;
        $data->state = $a->state;
        $data->pin_code = $a->pin_code;
        $data->phone_num = $a->phone_num;
        $data->role = 1;


        
        $data->password = bcrypt($a->password);
        
        $data->save();
        return redirect()->back()->with('error_code', 6);
        	
        }

    }

    public function login_page()
    {
        $category = Category::all();
        return view('frontend.user_login',compact('category'));
    }


    public function login(Request $a)
    {
        // echo '<pre>';
        // print_r($a->all());
        // die;
        $session_id = Session::getId();
        // echo $session_id;
        // die;

        $data = $a->all();
        $role_type = User::where('email',$data['email'])->first();

        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>$data['role']]))
        {
            if($role_type->role==1 and $role_type->status==1)
            {
                Session::put('front_session',$data['email']);
                Cart::where('session_id',$session_id)->update(['user_email'=>$a->email]);
                return redirect('/cart');
            }
            elseif ($role_type->role==0) 
            {
                return redirect('admin/dashboard');
            }
                
        }

        else
        {
            return redirect()->back()->with('message',"Invalid Username or Password");
        }
        
    }

    public function logout()
    {
        Session::forget('frontSession');
        Auth::logout();
        return redirect("/");
    }

    public function checkout(Request $a)
    {
          if(Auth::check())
        {
            $useremail = Auth::user()->email;
          
            $item = Cart::where('user_email',$useremail)->get();
            // print_r($item);
            // die;
            $category = Category::all();
            return view('frontend.checkout',compact('category','item'));
        }
    }

    public function registerusers(Request $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->pin_code = $data['pin_code'];
        $user->phone_num = $data['phone_num'];
        $user->role = 1;
        $user->password = bcrypt($data['password']);
        $user->status = 0;
        $user->save();

        // Email Verification
        $email = $data['email'];
        $messageData=[
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'code' => base64_encode($data['email'])
                     ];
        Mail::send('frontend.email_verify',$messageData,function($message) use($email)
        {
            $message->to($email)->subject('Confirm your Email Account');
        } );
            return redirect()->back()->with('message','Mail has been sent to your registered Email! Kindly verify your account.') ;
                // return redirect('cart');           
        }
    

    public function confirmAccount($email)
    {
        $email = base64_decode($email);  // Check EMaill in database
        $userCount = User::where('email',$email)->count();
        if($userCount>0)
        {
            // User Email already activated
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1)
            {
                // $message= "Your Email is already activated. please login.";
                return redirect('/')->with('message','Your Account is already activated. please login.');
            }

            else
            {
                User::where('email',$email)->update(['status' =>1]);
                return redirect('/')->with('message','Account Activated Successfully. kindly login!');
            }
        }

        else
        {
            abort(404);
        }

    }

    public function password_reset_link(Request $a)
    {
        $user = User::where('email',$a->email)->first(); 
        $to = $a->email;
        $id = $user['id'];

        Mail::send('frontend.email_pass_reset', [ 'user' => $user, 'code' => base64_encode($a['email'])] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('Reset Password');  
            });
        return redirect()->back()->with('message','Password Reset Link has been sent to your Email! Kindly Check.') ;
    }

     public function confirmPassword($email)
    {
        $email = base64_decode($email);  // Check EMaill in database
        $userCount = User::where('email',$email)->count();
        if($userCount>0)
        {
            $user = User::where('email',$email)->first();
            return view('frontend.reset_password',compact('user'));
        }

        else
        {
            abort(404);
        }

    }

    public function reset_password(Request $a)
    {
        $password = bcrypt($a->password);
        User::where('id',$a->id)->update(['password'=>$password]);
        // alert('password reset succefully');
        return redirect('/')->with('message','Your Password is Reset. Kindly Login.');
    }

      public function autocomplete(Request $request)
    {
        $data = Dish::select("dish_name")->where("dish_name","LIKE","%{$request->input('query')}%")->get();
   
        return response()->json($data);
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback() {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'google_id' => $user->id,'role'=>'1']);
                Auth::login($newUser);
                return redirect('/');
            }
        }
        catch(Exception $e) {
            // echo "no";
            return redirect('auth/google');
        }
    }
}
