<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //Generate Unique Reference Numbers
    public function reference_generator($wallet,$user){
        $ref = time();
        $ref .= substr($wallet,mt_rand(0,2),2);
        return substr($user,mt_rand(0,2),2) . $ref;
    }

    public function add($wallet_id,$user_id,$money){
        $this->wallet_id = $wallet_id;
        $this->user_id = $user_id;
        $this->money = $money;
        $this->reference = $this->reference_generator($wallet_id,$user_id);
        $this->save();
    }
}
