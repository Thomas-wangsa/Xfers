<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Xfers Depedency
use Xfers\Xfers;
use Xfers\User;
use Xfers\Charge;
// populate faker
use Faker\Factory as Faker;


/*
|--------------------------------------------------------------------------
| XfersController : Controller to handle Xfers Exercise
|--------------------------------------------------------------------------
| @author Thomas
| __construct  = set API Key in Header
| http://php.net/manual/en/language.oop5.decon.php
|
*/

class XfersController extends Controller
{	
	protected $api_key;
	protected $balance;

	public function __construct() {
        // modify api key
        $this->api_key = 'RxCDBsWyVy5gUycgjxtoKHQxTdsiyzpeTzv62ykjG3A';
        Xfers::setApiKey($this->api_key);
        // define ID Sandbox
		Xfers::setIDSandbox();
		$this->balance 			= User::retrieve()['available_balance'];
    }

    /*
    |--------------------------------------------------------------------------
    | Function information
    |--------------------------------------------------------------------------
    | @author Thomas
    | index()        : show balance & bank information based on exercise Xfers Mock 1
    | shop()         : show balance & list item
    | buy()       	 : creating a charge logic
    |
    */

    public function index() { 
    	// get balance 
		$balance 			= $this->balance;
		// get transfer info
		$transfer_info 		= User::transferInfo();
        return view('welcome',compact('balance','transfer_info'));
    }

    public function shop() {
    	// get balance
		$balance 			= $this->balance;
        return view('shop',compact('balance'));
    }

    public function buy(Request $request) {
    	try {
    		// populate faker
    		$faker 			= Faker::create();
    		// ternary check the transaction 
    		$this->balance - $request->ammount < 0 ? $transaction = false : $transaction = true;
    		
    		// POST https://sandbox.xfers.io/api/v3/charges
    		// move to catch conditional if failed/errors
	    	Charge::create(array(
	        'amount' 		=> $request->ammount,
	        'currency' 		=> 'IDR',
	        'order_id' 		=> $faker->uuid,
	        'redirect'		=> 'false',
	        'debit_only'	=> 'true'
	    	));

	    	// pass data to view
	    	$data['transaction']	= $transaction;
	    	$data['old_balance']	= $this->balance;
	    	$data['new_balance']	= $this->balance - $request->ammount;
	    	$data['ammount']		= $request->ammount;
	    	$data['item']			= $request->item;

	    	return view('buy',compact('data'));

    	}  catch (\Xfers\Error\InvalidRequest $e) {
    		echo 'Caught InvalidRequest exception: ', $e->getMessage(), "\n";
		}
    	
    }
}
