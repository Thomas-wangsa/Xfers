<?php

namespace Tests\Unit;

use Tests\TestCase;
// Xfers Depedency
use Xfers\Xfers;
use Xfers\User;

/*
|--------------------------------------------------------------------------
| XfersTest : Unit Testing to handle Xfers Exercise
|--------------------------------------------------------------------------
| @author Thomas
|
*/

class XfersTest extends TestCase
{

    /*
    |--------------------------------------------------------------------------
    | Unit Testing  
    |--------------------------------------------------------------------------
    | @return void
    |
    */

    public function testExample() {
    	
    	// api key auth from https://docs.xfers.io/#get-account-info
    	$api_key = '2zsujd47H3-UmsxDL784beVnYbxCYCzL4psSbwZ_Ngk';
        Xfers::setApiKey($api_key);
		Xfers::setSGSandbox(); 

      	// $data to set param in each function
        $data['balance']		= User::retrieve()['available_balance'];
        $data['transfer_info'] 	= User::transferInfo();
        // Test host available & Descrition Mockup A 
        $this->indexTest($data);
        // Test Shop Information Mockup B
        $this->shopTest($data);
        // Test Buy logic Mockup C
        $this->buyTest($data);
    }

    /*
    |--------------------------------------------------------------------------
    | Test host available & Descrition Mockup A
    |--------------------------------------------------------------------------
    | @return void
    |
    */

    private function indexTest($data) {
        $this->get('/')
        ->assertStatus(200)
        ->assertSee("Welcome Xfers!")
        ->assertSee("You Have Successfully created your wallet")
        ->assertSee("You can topup wallet by transfering to following bank")
        ->assertSee("Balance : ".number_format($data['balance'],2))
        ->assertSee("Bank Name : ".$data['transfer_info']['bank_name_abbreviation'])
        ->assertSee("Account Number : ".$data['transfer_info']['bank_account_no'])
        ->assertSee("Unique ID : ".$data['transfer_info']['unique_id']);
    }

    /*
    |--------------------------------------------------------------------------
    | Test Shop Information Mockup B
    |--------------------------------------------------------------------------
    | @return void
    |
    */

    private function shopTest($data) {
    	$this->get('/shop')
        ->assertStatus(200)
        ->assertSee("Shop Xfers!")
        ->assertSee("Kindle (20.000)")
        ->assertSee("Macbook (100.000)")
        ->assertSee("Balance : ".number_format($data['balance'],2));      
    }

    /*
    |--------------------------------------------------------------------------
    | Test Buy logic Mockup C
    |--------------------------------------------------------------------------
    | @return void
    |
    */
    
    private function buyTest($data) {
    	$response = $this->json('POST', '/buy', ['ammount' => '20000']);
        $response->assertStatus(200);
    }
}
