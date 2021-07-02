<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Frontend;
use App\Slider;
use App\About;
use App\Dish;
use App\Category;
use App\AddImage;
use App\Cart;
use App\DishOrder;
use App\DishItem;
use App\User;
use App\Review;
use App\Coupon;
use Carbon\Carbon;


use Mail;
use Session;

use Auth;
use DB;





class FrontendController extends Controller
{
    public function home()
    {
    	$slider = Slider::all();
    	$about = About::all();
    	// $category = Category::all();
        $category = DB::table('categories')->Limit(6)->get();
    	return view('frontend.index',compact('slider','about','category'));

    }

    public function dishshow($id)
    {
        // echo $id;
        $category = Category::all();
        $dish = DB::table('dishes')->where(['category_id'=>$id])->get();
    	return view('frontend.all_dishes',compact('dish','category'));

    }

    public function dishdetail($id)
    {
        // echo $id;
        $dish = Dish::find($id);
        $review = Review::where('dish_id',$id)->get();
        $avg_rate = Review::where(['dish_id'=>$id])->avg('rating');
        $rate1 = Review::where(['dish_id'=>$id,'rating'=>1])->avg('rating');
        $rate2 = Review::where(['dish_id'=>$id,'rating'=>2])->avg('rating');
        $rate3 = Review::where(['dish_id'=>$id,'rating'=>3])->avg('rating');
        $rate4 = Review::where(['dish_id'=>$id,'rating'=>4])->avg('rating');
        $rate5 = Review::where(['dish_id'=>$id,'rating'=>5])->avg('rating');
        $dish_image = AddImage::all();
        $category = Category::all();

        // $category = DB::table('dishes')->where(['dish_id'=>$id]);
        // $categories = DB::table('dishes')->where(['category_id'=>$category])->get();

        return view('frontend.dish_detail',compact('dish','dish_image','category','review','avg_rate','rate1','rate2','rate3','rate4','rate5'));

    }

    public function search_item(Request $a)
    {
    // print_r($a->all());
    $master = Category::all();
    $category = Category::all();
    $dish = Dish::where('dish_name', 'like' , '%' . $a->input('quary') .'%')->get(); 
    return view('frontend.search_item',compact('dish','master','category'));
    }


    public function add_to_cart(Request $a)
    {
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
        // echo '<pre>';
        // print_r($a->all());
          if(Auth::check())
        {
            $useremail = Auth::user()->email;
            $item = Cart::where('user_email',$useremail)->get();

        
        $data = new Cart;
        $data->user_email = $useremail;
        $data->dish_id = $a->dish_id;
        $data->dish_name = $a->dish_name;
        $data->dish_price = $a->dish_price;
        $data->dish_image = $a->dish_image;
        $data->dish_size = $a->dish_size;
        $data->dish_quantity = $a->dish_quantity;
        $data->session_id = $session_id;

        $data->save();


        if($data)
        {
            return redirect('cart');
        }
        }
       else
        {
        $data = new Cart;
        $data->dish_id = $a->dish_id;
        $data->dish_name = $a->dish_name;
        $data->dish_price = $a->dish_price;
        $data->dish_image = $a->dish_image;
        $data->dish_size = $a->dish_size;
        $data->dish_quantity = $a->dish_quantity;
        $data->session_id = $session_id;

        $data->save();


        if($data)
        {
            return redirect('cart');
        }
      }

    }

    public function cart()
    {
        if(Auth::check())
        {
            $useremail = Auth::user()->email;
            $item = Cart::where('user_email',$useremail)->get();

        }
        else
        {
        $session_id = Session::getId();
        // echo $session_id;
        // die;
        
        $item = Cart::where('session_id',$session_id)->get();
        }
        
        $category = Category::all();
        return view('frontend.cart',compact('item','category'));

    }

    public function update_quantity($id,$dish_quantity)
    {
        
         // echo $id;
         // echo $dish_quantity;
         
        DB::table('carts')->where('id',$id)->increment('dish_quantity',$dish_quantity);

        $item =  DB::table('carts')->select('dish_quantity')->where('id',$id)->get();

        // $html = view('layouts.partials.cities')->with(compact('cities'))->render();
        return response('yes')->json(['success' => true, 'html'=>'yes' ]);
    }

     #coupon code apply
    public function coupon_code_apply(Request $a)
     {
      Session::forget('couponamount');
      Session::forget('coupon');
      // print_r($a->all());
      // die;
        $data = $a->all();
        $coupon_count = coupon::where('coupon_code',$data['coupon'])->count();
      //   print_r($coupon_count);
      // die;
        if ($coupon_count == 0)
         {
          return redirect()->back()->with('massage','coupon code does not exits');
         }else
         {
            //echo "success";
            $coupon = coupon::where('coupon_code',$data['coupon'])->first();
            //check coupon code status
            if ($coupon->coupon_status==0)
             {
               return redirect()->back()->with('massage','coupon code  is not active');
             }
            //check coupon ecpity date
             $date = $coupon->expired_on;          
             $current_date = Carbon::now();

             if ($date < $current_date )
             {
                return redirect()->back()->with('massage','coupon  date is expired');
             }
        //coupon id ready for discount
           $session_id = Session::getId();
           $usercart = DB::table('carts')->where('session_id',$session_id)->get();
          $total_amount = 0;
          foreach ($usercart as $item)
          {
             $total_amount = $total_amount +($item->dish_price * $item->dish_quantity);
          }

          //check if coupon id fixed and parcentage
           if ($coupon->coupon_type=='Fixed')
           {
               $couponamount = $coupon->coupon_value;
           }else
           {
              $couponamount = $total_amount *($coupon->coupon_value/100);
           }
           //add coupon code in session
           Session::put('couponamount', $couponamount);
           Session::put('coupon',$data['coupon']);
           return redirect()->back()->with('massage','coupon code is succussfully applied');
         }
     }


    public function placeOrder(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all());
        $data = new DishOrder;
        $data->user_id = $a->user_id;
        $data->user_email = $a->user_email;
        $data->name = $a->name;
        $data->address = $a->address;
        $data->city = $a->city;
        $data->state = $a->state;
        $data->phone_num = $a->phone_num;
        $data->pin_code = $a->pin_code;
        $data->payment_method = $a->payment_method;
        $data->grand_total = $a->grand_total;
        $data->payment_status = 'Pending';
        $data->order_status = 'Pending';
        $data->order_id = Str::random(10);



        $data->save();

        $order_id = DB::getPdo()->lastInsertID(); 
        // print_r($order_id);
        // die;

        $dish_item = Cart::where('user_email',$data->user_email)->get();
        // echo "<pre>";
        // print_r($dish_item);
        foreach ($dish_item as $items) 
        {
            $dishs = new DishItem;
            $dishs->order_id = $order_id;
            $dishs->dish_name = $items->dish_name;
            $dishs->dish_price = $items->dish_price;
            $dishs->dish_quantity = $items->dish_quantity;
            $dishs->dish_size = $items->dish_size;
            $dishs->dish_image = $items->dish_image;
            $dishs->user_email = $items->user_email;
            $dishs->save();

        }

        if($data['payment_method']=='cod')
        {
            $user = User::where('email',$a->user_email)->first(); 
            $to = $a->user_email;
            $corder = DishOrder::all();
            $corderd = DishItem::all();
            $id = $data->id;
            // echo $id;
            // die;
            $subject = 'User Order Successful';
            $message = "Your Order Is Successful In PnInfosys Course Program \n\n"; 
            Mail::send('frontend.order_email', ['msg' => $message,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            });
            return redirect('thanks');
        }

        elseif($data['payment_method']=='paytm')
        {
            $amount = $a->grand_total;
            $order_id = $data->order_id;
            // echo $amount;
            // echo $order_id;

            $data_for_request = $this->handlePaytmRequest( $order_id, $amount );
            // print_r($data_for_request);
            // die;


            $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
            $paramList = $data_for_request['paramList'];
            $checkSum = $data_for_request['checkSum'];

            return view( 'paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
        }
    }


    // PayTM code
    public function handlePaytmRequest( $order_id, $amount ) {
            // Load all functions of encdec_paytm.php and config-paytm.php
            $this->getAllEncdecFunc();
            $this->getConfigPaytmSettings();

            $checkSum = "";
            $paramList = array();

            // Create an array having all required parameters for creating checksum.
            $paramList["MID"] = 'BdYCtP86446448279071';
            $paramList["ORDER_ID"] = $order_id;
            $paramList["CUST_ID"] = $order_id;
            $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
            $paramList["CHANNEL_ID"] = 'WEB';
            $paramList["TXN_AMOUNT"] = $amount;
            $paramList["WEBSITE"] = 'WEBSTAGING';
            $paramList["CALLBACK_URL"] = url( '/paytm-callback' );
            $paytm_merchant_key = 'hpkFFlWrA%aOl_it';

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

        return array(
            'checkSum' => $checkSum,
            'paramList' => $paramList
        );
    }

    public function paytmCallback( Request $request ) {
        // return $request;
        $order_id = $request['ORDERID'];

        if ( 'TXN_SUCCESS' === $request['STATUS'] )
         {
            $transaction_id = $request['TXNID'];
            $order = DishOrder::where( 'order_id', $order_id )->first();
            $order->payment_status = 'complete';
            $order->transaction_id = $transaction_id;
            $order->save();
            $user_email = Auth::user()->email;
            Cart::where('user_email',$user_email)->delete();
            $category = Category::all();
            $data = DishOrder::where('user_email',$user_email)->first();
            return view('frontend.thanks',compact('order','category','data'));
           
          } else if( 'TXN_FAILURE' === $request['STATUS'] ){
            return view( 'payment-failed' );
        }
    }


    public function thanks()
    {
        $user_email = Auth::user()->email;
        Cart::where('user_email',$user_email)->delete();
        $category = Category::all();
        $data = DishOrder::where('user_email',$user_email)->first();
        $item = DishItem::where('order_id',$data->id)->get();
        return view('frontend.thanks',compact('data','category','item'));
    }

    public function my_account()
    {
        $category = Category::all();
        return view('frontend.my_account',compact('category'));
    }

    public function address()
    {
        // $user_email = Auth::user()->email;
        // $address = User::where('order_id',$data->id)->get();
        $category = Category::all();

        return view('frontend.address',compact('category'));


    }

    public function orders()
    {
        $user_email = Auth::user()->email;
        $data = DishOrder::where('user_email',$user_email)->orderBy('id','desc')->get();
        $item = DishItem::all();
        $category = Category::all();

        return view('frontend.orders',compact('category','data','item'));

    }

    public function edit_address(Request $a)
    {
     $data = User::find($a->id); 
     $data->address = $a->address;
     $data->city = $a->city;  
     $data->state = $a->state;  
     $data->pin_code = $a->pin_code;  
     $data->save();
     return redirect('address'); 
 }

// Paytm method

 public function getAllEncdecFunc(){


function encrypt_e($input, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function decrypt_e($crypt, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function generateSalt_e($length) {
    $random = "";
    srand((double) microtime() * 1000000);
    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";
    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}
function checkString_e($value) {
    if ($value == 'null')
        $value = '';
    return $value;
}
function getChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getChecksumFromString($str, $key) {
   
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function verifychecksum_e($arrayList, $key, $checksumvalue) {
    $arrayList = removeCheckSumParam($arrayList);
    ksort($arrayList);
    $str = getArray2StrForVerify($arrayList);
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function verifychecksum_eFromStr($str, $key, $checksumvalue) {
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function getArray2Str($arrayList) {
    $findme   = 'REFUND';
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {
        $pos = strpos($value, $findme);
        $pospipe = strpos($value, $findmepipe);
        if ($pos !== false || $pospipe !== false)
        {
            continue;
        }
       
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function getArray2StrForVerify($arrayList) {
    $paramStr = "";
    $flag = 1;
    foreach ($arrayList as $key => $value) {
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function redirect2PG($paramList, $key) {
    $hashString = getchecksumFromArray($paramList);
    $checksum = encrypt_e($hashString, $key);
}
function removeCheckSumParam($arrayList) {
    if (isset($arrayList["CHECKSUMHASH"])) {
        unset($arrayList["CHECKSUMHASH"]);
    }
    return $arrayList;
}

function getTxnStatus($requestParamList) {
    return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}
function getTxnStatusNew($requestParamList) {
    return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}
function initiateTxnRefund($requestParamList) {
    $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
    $requestParamList["CHECKSUM"] = $CHECKSUM;
    return callAPI(PAYTM_REFUND_URL, $requestParamList);
}
function callAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                        
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postData))                                                                      
    );  
    $jsonResponse = curl_exec($ch);  
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function callNewAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                        
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postData))                                                                      
    );  
    $jsonResponse = curl_exec($ch);  
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getRefundArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getRefundArray2Str($arrayList) {  
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {        
        $pospipe = strpos($value, $findmepipe);
        if ($pospipe !== false)
        {
            continue;
        }
       
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);  
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $refundApiURL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
    $jsonResponse = curl_exec($ch);  
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}

    }

    function getConfigPaytmSettings(){

        define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
        define('PAYTM_MERCHANT_KEY', 'EBPwh5dj_XmW1L7%'); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', 'EbtGYn83534967686723'); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';
        if (PAYTM_ENVIRONMENT == 'PROD') {
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
    }
        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }
    
}


