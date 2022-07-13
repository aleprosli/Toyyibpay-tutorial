<?php

namespace App\Http\Controllers;

use Toyyibpay;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function getBankFPX()
    {
        $data = Toyyibpay::getBanksFPX();

        dd($data);
    }

    public function createFee(Request $request, Student $student)
    {
        $code = config('toyyibpay.code');

        $amount = 10 * 100;

        $bill_object = [
            'billName'=> 'Fee Membership',
            'billDescription'=> 'Class Fee '.$student->interest,
            'billPriceSetting'=> 1,
            'billPayorInfo'=> 1,
            'billAmount'=> $amount,
            'billExternalReferenceNo' => $student->name.' '.$student->interest,
            'billTo'=> $student->name,
            'billEmail'=> $student->email,
            'billPhone'=> $student->phone_number,
        ];
        
        $data = Toyyibpay::createBill($code, (object)$bill_object);

        $bill_code = $data[0]->BillCode;

        return redirect()->route('bill:payment', $bill_code);
    }

    public function billPaymentLink($bill_code)
    {
        $data = Toyyibpay::billPaymentLink($bill_code);

        return redirect($data);
    }
}
