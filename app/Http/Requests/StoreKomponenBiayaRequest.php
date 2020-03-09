<?php

namespace App\Http\Requests;

use App\KomponenBiaya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreKomponenBiayaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('komponen_biaya_manage'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],
        ];
    }
}
