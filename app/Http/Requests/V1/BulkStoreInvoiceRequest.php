<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //because it's running in the array for the paycheck so use *.
            '*.customerId'=>['required','integer'],
            //provide rule either in Individual or Buissness,
            '*.amount'=>['required','numeric'],
            '*.status'=>['required', Rule::in(['B','P','V','b','p','v'])],//status with a bill is billed, paid or void
            '*.billedDate'=>['required','date_format:Y-m-d H:i:s'],
            '*.paidDate'=>['date_format:Y-m-d H:i:s','nullable'],
            
        ];
    }
    protected function prepareForValidation(){
       $data = [];

       foreach ($this->toArray() as $obj){

        $obj['customer_id'] = $obj['customerId']??null;
        $obj['billed_date'] = $obj['billedDate']??null;
        $obj['paid_date'] = $obj['paidDate']??null;

        $data[] = $obj;

       }
       $this->merge($data);
    }
}

