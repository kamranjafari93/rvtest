<?php

use App\Wallet;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Wallet::create([
                'user_id' => $faker->randomDigitNotNull,
                'balance' => $faker->randomFloat(2,-9999999999,9999999999),
            ]);
        }
    }
}
