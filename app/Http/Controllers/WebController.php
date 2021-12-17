<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Crypt;
use \Cache;
use Stripe;
use Exception;
use App\Payment;
use App\Pricing;
use App\Subscription;
use App\Models\User;
use App\States;
use App\Search;
use App\Report;
use App\Mail\ContactUsMail;
use App\Mail\PermitRequestMail;
use App\Mail\PermitRequestApproveNotifyMail;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\PermitRequest;
use App\SearchAddress;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class WebController extends Controller
{

    
    public function index()
    {
        $this->sesDestroy();
        $states = DB::table('state_list')->get();
        // $this->getAllSearchRecords();
        if (isset($_GET['getcredits']) && $_GET['getcredits'] === 'yes')
            $price = DB::table('pricing')->where('report', 1)->get();
        else
            $price = DB::table('pricing')->get();

       $user = DB::table('admins')->where('role_id', 1)->get();

        if(!empty($user)){

        $to_name = $user[0]->name;
        $to_email = $user[0]->email;
        $from_email = config('app.from_email');
        $data = [];

        /* Mail::send('mail.pricemail', $data, function($message) use ($email, $subject) {
    $message->to($email)->subject($subject);
});
*/

                        Mail::send('mail.pricemail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Price search Test Mail');
            $message->from('amit.tiwari@sinelogix.com','Test Mail');
}); 
}

        return view('index')->with(['states' => $states, 'price' => $price]);
    }

    public function sesDestroy()
    {
        \Session::forget(['search', 'pricePlan', 'blurSignErr']);
    }

    public function aboutus()
    {
        $this->sesDestroy();
        \Session::forget(['loginPOPUP', 'forgetPass']);
        return view('about-us');
    }

    public function pricing()
    {

        if (!isset($_GET['type'])) {
            \Session::put('buycredits', false);
            $this->sesDestroy();
        } else
            \Session::put('buycredits', true);

        \Session::forget(['loginPOPUP', 'forgetPass']);

        if (\Session::get('PermitRequestData') != null) {
            if (\Session::get('usePermit') == 0) {
                $price = DB::table('pricing')->where('report', 1)->first();
                return redirect('buy-subscription/' . Crypt::encrypt($price->id));
            } else {
                return redirect('/');
            }
        } else
            $price = DB::table('pricing')->get();
        return view('pricing')->with('price', $price);
    }


    public function subscribe()
    {
        if (!isset($_GET['type'])) {
            \Session::put('buycredits', false);
            $this->sesDestroy();
        } else
            \Session::put('buycredits', true);

        \Session::forget(['loginPOPUP', 'forgetPass']);

        if (\Session::get('PermitRequestData') != null) {
            if (\Session::get('usePermit') == 0) {
                $price = DB::table('pricing')->where('report', 1)->first();
                return redirect('buy-subscription/' . Crypt::encrypt($price->id));
            } else {
                return redirect('/');
            }
        } else
            $price = DB::table('pricing')->get();

        return view('subscribe')->with('subscribe', $price);
    }

    public function faq()
    {
        $this->sesDestroy();
        \Session::forget(['loginPOPUP', 'forgetPass']);
        return view('faq');
    }

    public function privacyPolicy()
    {
        $this->sesDestroy();
        \Session::forget(['loginPOPUP', 'forgetPass']);
        return view('privacy-policy');
    }

    public function termAndCondition()
    {
        $this->sesDestroy();
        \Session::forget(['loginPOPUP', 'forgetPass']);
        return view('term-condition');
    }

    public function contactus()
    {
        $this->sesDestroy();
        \Session::forget(['loginPOPUP', 'forgetPass']);
        $data = DB::table('Inquirey')->get();
        return view('contact-us')->with('data', $data);
    }

    public function redirectHome()
    {
        $g = 'yes';
        \Session::put('forgetPass', $g);
        return redirect('/');
    }


    public function getAllSearchRecords()
    {
        $value = Cache::rememberForever('search_data_cache', function () {
            return DB::table('search')
                ->orderBy('PropertyFullAddress', 'asc')
                ->get();
        });
    }

    public function searchPermit(Request $request)
    {
        $search = DB::table('search')
            ->where('PropertyFullAddress', 'LIKE', '%' . $request->input('data') . '%')
            ->orWhere('PropertyCity', 'LIKE', $request->input('data') . '%')
            ->orderBy('PropertyFullAddress', 'asc')->limit(100)

            ->get();
        $res = [];
        foreach ($search as $key => $value) {
            $res[$value->PropertyFullAddress][] = [
                'id' => Crypt::encrypt($value->PropertyFullAddress),
                'PropertyFullAddress' => $value->PropertyFullAddress
            ];
        }
        if (!empty($res)) {
            return response()->json($res);
        } else {
            return "empty";
        }
    }

    // public function searchPermit(Request $request) {

    //     $search = Cache::get('search_data_cache');
    //     $res = [];
    //     foreach ($search as $key => $value) {
    //         if(@strstr($value->PropertyFullAddress, strtoupper($request->input('data')))
    //             || @strstr($value->PropertyCity, strtoupper($request->input('data')))
    //             || @strstr($value->PropertyFullAddress, $request->input('data'))
    //             || @strstr($value->PropertyCity, $request->input('data'))
    //         )
    //         {
    //             $res[$value->PropertyFullAddress][] = [
    //                 'id' => Crypt::encrypt($value->PropertyFullAddress),
    //                 'PropertyFullAddress' => $value->PropertyFullAddress
    //             ];
    //         }
    //     }
    //     if(!empty($res)){
    //         return response()->json($res);
    //     }else{
    //         return "empty";
    //     }
    // }

    public function searchPermitResult($id)
    {
        \Session::put('search_address_id', $id);
        $id = Crypt::decrypt($id);
        $filter = DB::table('search')->where('PropertyFullAddress', $id)->get();
        $price = DB::table('pricing')->get();
        $array = [];
        foreach ($filter as $key => $value) {
            $value->searchTitle = $value->PropertyFullAddress;
            // $array[] = $value->searchTitle.' '.$value->PropertyCity.' '.$value->PropertyState.' '.$value->PropertyZipCode;
            $array[] = $value->PropertyFullAddress;
            $array[$value->PermitStatus][] = $value;
        }

        \Session::put('search', $array);
        // echo "<pre>";print_r($array);die;
        if (Auth::guard('web')->check()) {
            return redirect('/dashboard/permit');
        } else {
            return view('table-blur')->with(['data' => $array, 'price' => $price]);
        }
    }

    public function getPriceDetails(Request $request)
    {
        $id = Crypt::decrypt($request->input('id'));
        $data = DB::table('pricing')->where('id', $id)->get();
        foreach ($data as $key => $value) {
            $value->id = Crypt::encrypt($value->id);
        }
        \Session::put('pricePlan', $data);
        return response()->json($data);
    }

    public function getFormDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'stripeToken' => ['required', 'string', 'max:255'],
            'priceIDVal' => ['required'],
        ]);

        $attributeNames = array(
            'name' => 'Name',
            'email' => 'Email',
            'Password' => 'Password',
            'stripeToken' => 'Card Info',
            'priceIDVal' => 'Price Plan'
        );

        $validator->setAttributeNames($attributeNames);
        if ($validator->fails()) {
            $de = $validator->errors();
            \Session::put('blurSignErr', 'error');
            return redirect()->back()->withFail($de);
        } else {
            \Session::forget(['blurSignErr']);
            // echo "<pre>";print_r($request->all());die;
            $user = DB::table('users')->where('email', $request->input('email'))->get();
            if ($user->isEmpty()) {
                if ($request->input('password') == $request->input('password_confirmation')) {
                    $insert_id = DB::table('users')->insertGetId([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),
                    ]);

                    $amount = Pricing::where('id', Crypt::decrypt($request->priceIDVal))->first();
                    $secrete_key = config('app.STRIPE_SECRET');
                    Stripe\Stripe::setApiKey($secrete_key);
                    $check = DB::table('payment')->where('user_id', $insert_id)->get();
                    if ($check->isEmpty()) {
                        try {
                            $customer = Stripe\Customer::create(array(
                                'email' => $request->input('email'),
                                'source'  => $request->stripeToken
                            ));
                        } catch (Exception $e) {
                            $api_error = $e->getMessage();
                        }
                        if ($amount->plan_period != "single") {
                            // Creates a new plan
                            try {
                                $plan = Stripe\Plan::create(array(
                                    "product" => [
                                        "name" => $amount->title
                                    ],
                                    "amount" => $amount->price * 100,
                                    "currency" => 'usd',
                                    "interval" => "month"
                                ));
                            } catch (Exception $e) {
                                $api_error = $e->getMessage();
                            }

                            if (empty($api_error) && $plan) {
                                // Creates a new subscription
                                try {
                                    if (isset($request->coupon_code)) {
                                        $subscription = Stripe\Subscription::create([
                                            "customer" => $customer->id,
                                            "items" => [["plan" => $plan->id,],],
                                            "coupon"    =>  $request->coupon_code,
                                        ]);
                                    } else {
                                        $subscription = Stripe\Subscription::create([
                                            "customer" => $customer->id,
                                            "items" => [["plan" => $plan->id,],],
                                        ]);
                                    }
                                } catch (Exception $e) {
                                    $api_error = $e->getMessage();
                                }

                                if (empty($api_error) && $subscription) {
                                    // DATAbase Insert
                                    $subsData = $subscription->jsonSerialize();
                                    $payAarray = [
                                        'user_id' => $insert_id,
                                        'price_id' => $amount->id,
                                        'stripe_customer' => $customer->id,
                                        '_token' => $request->input('_token')
                                    ];

                                    $payment_id = DB::table('payment')->insertGetId($payAarray);

                                    $subArray = [
                                        'payment_id' => $payment_id,
                                        'subscription_id' => $subsData['id'],
                                        'plan_id' => $subsData['plan']['id'],
                                        'plan_amount' => $subsData['plan']['amount'] / 100,
                                        'plan_currency' => $subsData['plan']['currency'],
                                        'plan_interval' => $subsData['plan']['interval'],
                                        'plan_interval_count' => $subsData['plan']['interval_count'],
                                        'plan_start' => date("Y-m-d H:i:s", $subsData['current_period_start']),
                                        'plan_end' => date("Y-m-d H:i:s", $subsData['current_period_end']),
                                        'status' => $subsData['status'],
                                        '_token' => $request->input('_token')
                                    ];

                                    DB::table('subscription')->insertGetId($subArray);
                                    Auth::loginUsingId($insert_id);
                                    return redirect('/dashboard/account/subscription');
                                } else {
                                    $statusMsg = "Subscription creation failed! " . $api_error;
                                    echo "<pre>";
                                    print_r($statusMsg);
                                    die;
                                }
                            } else {
                                $statusMsg = "Plan creation failed! " . $api_error;
                                echo "<pre>";
                                print_r($statusMsg);
                                die;
                            }
                        } else {
                            $stripe = Stripe\Charge::create([
                                "customer" => $customer->id,
                                "amount" => $amount->price * 100,
                                "currency" => 'USD'
                            ]);

                            $payAarray = [
                                'user_id' => $insert_id,
                                'price_id' => $amount->id,
                                'stripe_customer' => $customer->id,
                                '_token' => $request->input('_token')
                            ];
                            DB::table('payment')->insertGetId($payAarray);


                            Auth::loginUsingId($insert_id);
                            $deductCreditAmount = app('App\Http\Controllers\UserController')->creditRem();

                            // if(\Session::get('PermitRequestData') == null){
                            //     return redirect('/');
                            // }else{
                            //     $deductCreditAmount = app('App\Http\Controllers\UserController')->addUserReportSesion();
                            //     return redirect('/dashboard/permit-requests');
                            // }

                            Auth::loginUsingId($insert_id);
                            if (Session::get('search_address_id')) {
                                Session::forget('search_address_id');
                                return redirect('/dashboard/permit');
                            } else {
                                if (\Session::get('PermitRequestData') != null && \Session::get('usePermit') > 0) {
                                    $deductCreditAmount = app('App\Http\Controllers\UserController')->addUserReportSesion();
                                    return redirect('/dashboard/permit-requests?request=new');
                                    // return redirect('dashboard/permit-requests')->withSuccess('Permit Request sent successfully!');
                                }
                                return redirect('/');
                            }
                        }
                    }
                    Auth::loginUsingId($insert_id);
                    return redirect('/dashboard/permit');
                } else {
                    return redirect()->back()->withError('Password & Confirm password does not match.');
                }
            } else {
                return redirect()->back()->withError('Email already exists.');
            }
            // echo "<pre>";print_r($request->all());die;
        }
    }

    public function getLoginDetails(Request $request)
    {
        $search = \Session::get('search');
        $user = DB::table('users')->where('email', $request->input('email'))->get();

        // print_r($user);die;
        if (!$user->isEmpty()) {
            if (\Hash::check($request->input('password'), $user[0]->password)) {
                Auth::loginUsingId($user[0]->id);
                $deductCreditAmount = app('App\Http\Controllers\UserController')->creditRem();
                if (\Session::get('PermitRequestData') != null) {
                    $deductCreditAmount = app('App\Http\Controllers\UserController')->addUserReportSesion();
                    return response()->json('permit-request-credits-handle');
                }

                return response()->json('success');
                // return redirect('/dashboard/permit');
            } else {
                return response()->json('error');
            }
        } else {
            // return redirect()->back()->withFfail('Email & password does not match.');
            return response()->json('error');
        }
    }

    public function contactUsForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'string', 'max:11'],
            'enq' => ['required', 'string'],
            'des' => ['required'],
        ]);

        if ($validator->fails()) {
            $de = $validator->errors();
            return response()->json('error');
        } else {
            $array = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('mobile'),
                'inquiry' => $request->input('enq'),
                'description' => $request->input('des'),
                '_token' => $request->input('_token')
            ];
            DB::table('contact_us')->insert($array);

            $email = $array['email'];
            $details = [
                'Name' => $array['name'],
                'subject' => 'Contact Us'
            ];

            \Mail::to($email)
                ->send(new ContactUsMail($details));

            return response()->json('success');
        }
    }

    public function getSubscription($id)
    {
        if (!Auth::check())
            \Session::put('loginPOPUP', 'login');
        \Session::put('subscribe_id', $id);
        if (Auth::guard('web')->check()) {
            return redirect('/payment');
        } else {
            return redirect('/');
        }
    }

    public function getPaymentForm()
    {
        try {
            // if(\Session::has('loginPOPUP')){
            $sub_id = \Session::get('subscribe_id');
            $payment = DB::table('payment')->where('user_id', Auth::guard('web')->user()->id)->offset(0)->limit(1)->orderBy('id', 'DESC')->get();
            if (!$payment->isEmpty()) {
                $today = date("Y-m-d");
                $expire = date("Y-m-d", strtotime("+1 month", strtotime($payment[0]->created_at)));
                if ($today < $expire) {

                    $myReportPrimeReport =
                        DB::table('permit_requests')
                        ->where('user_id', Auth::guard('web')
                            ->user()->id)->whereIn('status', [0, 1])
                        ->where('payment_id', $payment[0]->id)
                        ->get()->count();

                    $myReportSearchAddress =
                        DB::table('search_address')
                        ->where('user_id', Auth::guard('web')
                            ->user()->id)->where('payment_id', $payment[0]->id)
                        ->get()->count();

                    $report = $myReportSearchAddress + $myReportPrimeReport;
                    $price = DB::table('pricing')->where('id', $payment[0]->price_id)->offset(0)->limit(1)->orderBy('id', 'DESC')->get();
                    if (!$price->isEmpty()) {
                        $reportt = explode(' ', $price[0]->report);
                        if ($reportt[0] == 'Unlimited') {
                            $reportt[0] = '10000';
                        }
                        $rem = $reportt[0] - $report;
                    } else {
                        $rem = 0;
                    }
                } else {
                    $rem = 0;
                }
            } else {
                $rem = 0;
            }

            if ($rem == 0) {
                $price = DB::table('pricing')->where('id', Crypt::decrypt($sub_id))->get();
                return view('payment')->with('data', $price);
            } else {
                return redirect('/pricing')->withFfail('You have already purchased a plan.');
            }
            /*}else{
            return redirect('/pricing');
        }*/
        } catch (Exception $e) {
            return redirect('/pricing')->withFfail('Something went wrong.');
            //dd($e);
        }
    }

    public function getPayentDetails(Request $request)
    {
        if (!empty($request->input('_token'))) {
            $user   = \Auth::user();
            $sub    = Pricing::where('id', Crypt::decrypt($request->SBID))->first();
            $check  = Payment::where('user_id', $user->id)->first();

            // echo "<pre>";print_r($check);die;
            $secrete_key = config('app.STRIPE_SECRET');
            Stripe\Stripe::setApiKey($secrete_key);

            /*$coupon = \Stripe\Coupon::create([
              'duration' => 'once',
              'id' => '50PEROFF',
              'percent_off' => 50,
            ]);
            dd($coupon);
            */
            if (isset($check) && $check != null) {
                $customer = (object)[
                    'id' => $check->stripe_customer
                ];
            } else {
                try {
                    $customer = Stripe\Customer::create(array(
                        'email' => $user->email,
                        'source'  => $request->stripeToken
                    ));
                } catch (Exception $e) {
                    $api_error = $e->getMessage();
                }
            }

            // echo "<pre>";print_r($customer);die;

            if ($sub->plan_period != "single") {
                // Creates a new plan
                try {
                    $plan = Stripe\Plan::create(array(
                        "product" => [
                            "name" => $sub->title
                        ],
                        "amount" => $sub->price * 100,
                        "currency" => 'usd',
                        "interval" => "month"
                    ));
                } catch (Exception $e) {
                    $api_error = $e->getMessage();
                }

                if (empty($api_error) && $plan) {
                    // Creates a new subscription
                    try {
                        if (isset($request->coupon_code)) {
                            $subscription = Stripe\Subscription::create([
                                "customer" => $customer->id,
                                "items" => [["plan" => $plan->id],],
                                "coupon"    =>  $request->coupon_code,
                            ]);
                        } else {
                            $subscription = Stripe\Subscription::create([
                                "customer" => $customer->id,
                                "items" => [["plan" => $plan->id],],
                            ]);
                        }
                    } catch (Exception $e) {
                        $api_error = $e->getMessage();
                    }

                    if (empty($api_error) && $subscription) {
                        // DATAbase Insert
                        $subsData = $subscription->jsonSerialize();
                        $payAarray = [
                            'user_id' => $user->id,
                            'price_id' => $sub->id,
                            'stripe_customer' => $customer->id,
                            '_token' => $request->input('_token')
                        ];

                        $payment_id = Payment::insertGetId($payAarray);

                        $subArray = [
                            'payment_id' => $payment_id,
                            'subscription_id' => $subsData['id'],
                            'plan_id' => $subsData['plan']['id'],
                            'plan_amount' => $subsData['plan']['amount'] / 100,
                            'plan_currency' => $subsData['plan']['currency'],
                            'plan_interval' => $subsData['plan']['interval'],
                            'plan_interval_count' => $subsData['plan']['interval_count'],
                            'plan_start' => date("Y-m-d H:i:s", $subsData['current_period_start']),
                            'plan_end' => date("Y-m-d H:i:s", $subsData['current_period_end']),
                            'status' => $subsData['status'],
                            '_token' => $request->input('_token')
                        ];

                        Subscription::insertGetId($subArray);
                        \Session::forget('loginPOPUP');
                        return redirect('/dashboard/account/subscription')->withSuccess('Payment successfully!');
                    } else {
                        $statusMsg = "Subscription creation failed! " . $api_error;
                        // echo "<pre>";print_r($statusMsg);die;
                    }
                } else {
                    $statusMsg = "Plan creation failed! " . $api_error;
                    // echo "<pre>";print_r($statusMsg);die;
                }
            } else {
                $stripe = Stripe\Charge::create([
                    "customer" => @$customer->id,
                    "amount" => @$sub->price * 100,
                    "currency" => 'USD'
                ]);

                $payAarray = [
                    'user_id' => $user->id,
                    'price_id' => $sub->id,
                    'stripe_customer' => $customer->id,
                    '_token' => $request->input('_token')
                ];
                DB::table('payment')->insertGetId($payAarray);
                \Session::forget('loginPOPUP');

                $deductCreditAmount = app('App\Http\Controllers\UserController')->creditRem();

                if (\Session::get('buycredits')) {
                    \Session::forget('buycredits');
                    return redirect('dashboard/permit')->withSuccess('Payment successfully!');
                } else {
                    if (\Session::get('PermitRequestData') != null && \Session::get('usePermit') > 0) {
                        $deductCreditAmount = app('App\Http\Controllers\UserController')->addUserReportSesion();
                        return redirect('/dashboard/permit-requests?request=new');
                        // return redirect('dashboard/permit-requests')->withSuccess('Permit Request sent successfully!');
                    }
                    return redirect('/');
                }
            }
        } else {
            return redirect('/payment');
        }
    }

    public function getSubsCancel()
    {
        $stripe = new \Stripe\StripeClient(
            'sk_test_51Iuz7eJLnrSaon0lrxPZ0IE9zebwpM0IzGEd1hazHutsZNb7zAu4XFZQLzuxvKKUE2duUrwej0kyrP7e8tm1RG0c00yj1xqEPE'
        );
        // $response = $stripe->subscriptions->cancel(
        //   'sub_JdE8pdKZCBgUgo',
        //   ['prorate' => 'true']
        // );

        // $response = $stripe->plans->delete(
        //   'plan_JdE8zXMGgSTTdG',
        //   []
        // );

        echo "<pre>";
        print_r($response);
    }

    /**
     * function to check that the given coupon is valid or not
     */
    public function validateCoupon(Request $request)
    {
        try {

            $secrete_key = config('app.STRIPE_SECRET');

            Stripe\Stripe::setApiKey($secrete_key);

            $total  = '';
            $original_price = '';
            $coupon = \Stripe\Coupon::retrieve($request->coupon); //->toArray();
            $sub    = Pricing::where('id', Crypt::decrypt($request->SBID))->first();
            if (isset($coupon->percent_off) && isset($sub)) {
                $original_price = $sub->price;
                $total = $sub->price * ($coupon->percent_off / 100);
            }
        } catch (Exception $e) {
            $api_error = $e->getMessage();
            return ['status' => 'false', 'message' => $api_error];
        }
        return ['status' => 'true', 'message' => '', 'original_price' => $original_price, 'updated_price' => $total];
    }

    public function approvePermitRequests($ids)
    {
        if (isset($ids) && $ids != null) {

            $idsArr = explode(',', $ids);

            $PermitRequestObj = new PermitRequest();

            $PermitRequestLoad = $PermitRequestObj->whereIn('id', $idsArr)->where('status', '!=',    '2')->get();
            if ($PermitRequestLoad != null) {
                foreach ($PermitRequestLoad as $addressObj) {
                    $house_number = filter_var($addressObj['property_street_name'], FILTER_SANITIZE_NUMBER_INT);

                    $street_name = str_replace($house_number . ' ', '', $addressObj['property_street_name']);

                    $matchedAddressObj = Search::where('PropertyCity', 'LIKE', '%' . $addressObj['property_city'] . '%')
                        ->where('PropertyState', $addressObj['property_state'])
                        ->where('PropertyZipCode', $addressObj['zip_code'])
                        ->Where('PropertyHouseNumber', $house_number)
                        ->Where('PropertyStreetName', 'LIKE', '%' . $street_name . '%')
                        ->first();

                    if (isset($matchedAddressObj) && $matchedAddressObj != null) {
                        $SearchAddress['user_id'] = $addressObj->user_id;
                        $SearchAddress['search_name'] = $matchedAddressObj->PropertyFullAddress;
                        $SearchAddress['payment_id'] = $addressObj->payment_id;
                        $SearchAddress['price_id'] = $addressObj->price_id;
                        $SearchAddress['alarm'] = 0;
                        $SearchAddress['valid_upto'] = date("Y-m-d H:i:s", strtotime("+1 month", strtotime($addressObj->created_at)));
                        $SearchAddress['created_at'] = date("Y-m-d H:i:s");
                        $SearchAddress['updated_at'] = date("Y-m-d H:i:s");
                        $SearchAddress['deleted_at'] = date("Y-m-d H:i:s");

                        $UpdatedAddressId = SearchAddress::insertGetId($SearchAddress);

                        if ($UpdatedAddressId) {

                            Report::insertGetId(['search_add_id' => $UpdatedAddressId, 'search_id' => $matchedAddressObj->id]);

                            PermitRequest::where('id', $addressObj->id)->update(['status' => '2', 'flag' => "Address Matched and approved"]);

                            try {
                                \Mail::to($addressObj->email_address)->send(new PermitRequestApproveNotifyMail($addressObj));
                            } catch (Exception $e) {
                                // dd($e);
                            }
                        }
                    } else {
                        $NotMatchAddress[] = $addressObj->id;
                        PermitRequest::where('id', $addressObj->id)->update(['status' => '1', 'flag' => "Address Not Matched"]);
                    }
                }
                //success matched
                if (isset($NotMatchAddress) && @count($NotMatchAddress) > 0)
                    return 2;
                else
                    return 1;
            } else {
                //not matched
                return 3;
            }
        }
        return http_response_code(404);
    }


    public function permitRequestFilesUpload($permt_req_id, Request $request)
    {

        // Handle file Upload
        if ($request->hasFile('upload_docs')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('upload_docs')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('upload_docs')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('upload_docs')->storeAs('public/upload_docs', $fileNameToStore);

            $read_excel = Excel::toArray([], $path);
            $excel_headers = "";
            if (isset($read_excel[0][1]) && !empty($read_excel[0][1])) {
                $excel_headers = $read_excel[0][0];
                unset($read_excel[0][0]);
                foreach ($read_excel as $key_data => $row) {

                    dd(123, $key_data, $row[$key_data + 1][0], $row[$key_data + 1][5]);
                    $array = [
                        'masterpermitid' => $row[$key_data + 1][0],
                        'sourceid' => $row[$key_data + 1][1],
                        'sourcepermitid' => $row[$key_data + 1][2],
                        'fipscode' => $row[$key_data + 1][3],
                        'location' => $row[$key_data + 1][4],
                        'propertyfulladdress' => $row[$key_data + 1][5] . ', ' . $row[$key_data + 1][16] . ', ' . $row[$key_data + 1][17] . ' 0' . $row[$key_data + 1][18],
                        'propertyhousenumberprefix' => $row[$key_data + 1][6],
                        'propertyhousenumber' => $row[$key_data + 1][7],
                        'propertyhousenumbersuffix' => $row[$key_data + 1][8],
                        'propertydirection' => $row[$key_data + 1][9],
                        'propertystreetname' => $row[$key_data + 1][10],
                        'propertymode' => $row[$key_data + 1][11],
                        'propertyquadrant' => $row[$key_data + 1][12],
                        'propertyunitnumber' => $row[$key_data + 1][13],
                        'propertycity' => $row[$key_data + 1][14],
                        'propertystate' => $row[$key_data + 1][15],
                        'propertyzipcode' => '0' . $row[$key_data + 1][16],
                        'propertyzipcodeplusfour' => $row[$key_data + 1][17],
                        'permitnumber' => (string)$row[$key_data + 1][18],
                        'projectname' => $row[$key_data + 1][19],
                        'permittype' => $row[$key_data + 1][20],
                        'permitsubtype' => $row[$key_data + 1][21],
                        'permitclass' => $row[$key_data + 1][22],
                        'permitdescription' => $row[$key_data + 1][23],
                        'permitstatus' => $row[$key_data + 1][24],
                        'permitstatusdate' => $row[$key_data + 1][25],
                        'permiteffectivedate' => $row[$key_data + 1][26],
                        'permitjobvalue' => $row[$key_data + 1][27],
                        'permitfee' => $row[$key_data + 1][28],
                        'applicantname' => $row[$key_data + 1][29],
                        '_token' => ""
                    ];

                    //
                    $check = Search::where('permitnumber', $array['permitnumber'])->first();
                    $check1 = SearchAddress::where(['search_name' => $array['propertyfulladdress'], 'alarm' => 1])->first();
                } // Loops Ends
            }


            $payAarray = [
                'permit_request_id' => $permt_req_id,
                'file_name' => $fileNameToStore,
                'created_at' => date("Y-m-d h:i:m")
            ];
            $statusId = DB::table('permit_request_files')->insertGetId($payAarray);
            if ($statusId)
                return 1;
        } else {

            return 'file not found';
        }
    }

    public function loadPermitRequestFiles($permt_req_id)
    {
        return DB::table('permit_request_files')->where('status', '0')->where('permit_request_id', $permt_req_id)->orderByDesc('id')->get();
    }
}
