<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankCard;

class BankCardController extends Controller
{
    public function index()
    {

//        must be user id to select who own cards
        $bankCards = BankCard::all();

        if ($bankCards) {
            $temp = [];

            foreach ($bankCards as $card) {
                $temp[] =
                    ['number' => substr($card->number, -4),
                        'date' => $card->expiry_date,
                        'month' => $card->expiry_month,

                    ];
            }
        }

        return $temp;
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|digits:16',
            'expiry_date' => 'required|digits:2',
            'expiry_month' => 'required|digits:2',
            'cvv' => 'required|digits:3',
        ]);
        try {
            $bankCard = BankCard::create([
                'number' => $request->number,
                'expiry_date' => $request->expiry_date,
                'expiry_month' => $request->expiry_month,
                'cvv' => $request->cvv,
            ]);
            return true;
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }

    }
}
