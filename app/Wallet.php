<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function updateBalance($amount)
    {
        $this->balance += $amount;
        $this->save();
    }
}
