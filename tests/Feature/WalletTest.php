<?php

namespace Tests\Feature;

use App\Wallet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetBalance()
    {
        $user = Wallet::select(['user_id','balance'])->take(8)->get();
        $index = mt_rand(0,7);
        $response = $this->json('GET',  '/api/wallets/'.$user[$index]->user_id.'/balance');

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'balance' => $user[$index]->balance
            ]);
    }

    public function testAddMoney()
    {
        $user = Wallet::select(['user_id','balance'])->take(8)->get();
        $price = mt_rand(-99999999,99999999);
        $index = mt_rand(0,7);
        $response = $this->json('PUT',  '/api/wallets/'.$user[$index]->user_id.'/add-money/'.$price);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'reference_id'
            ]);
    }
}
