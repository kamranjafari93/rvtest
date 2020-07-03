<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WalletController extends Controller
{
    public function addMoney(Request $rq){

        //validation
        $validator = Validator::make(['user_id'=>$rq->user_id,'amount'=>$rq->amount], [
            'user_id' => 'required|min:1',
            'amount' =>  'required|notIn:0|min:-99999999999999999999|max:99999999999999999999',
        ]);
        if ($validator->fails()) {
            return response()->json(false, 400);
        }


        //Finding User's Wallet
        $wallet = Wallet::where('user_id',$rq->user_id)->first();

        //Log Transaction
        if($wallet){
            $transaction = new Transaction();
            $transaction->add($wallet->id,$rq->user_id,$rq->amount);

            $wallet->updateBalance($rq->amount);

            return response()->json(array('reference_id' => $transaction->reference), 200);
        }
        else{
            return response()->json(false, 404);
        }

    }

    public function balance(Request $rq){
        //validation
        $validator = Validator::make(['user_id'=>$rq->user_id], [
            'user_id' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(false, 400);
        }

        //Finding User's Wallet
        $wallet = Wallet::where('user_id',$rq->user_id)->first();


        if($wallet){
            return response()->json(array('balance' => $wallet->balance), 200);
        }
        else{
            return response()->json(false, 404);
        }

    }
}
