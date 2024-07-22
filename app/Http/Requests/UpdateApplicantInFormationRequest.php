<?php

namespace App\Http\Requests;

use App\Models\ApplicantInFormation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicantInFormationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applicant_in_formation_edit');
    }

    public function rules()
    {
        return [
            'full_name_of_applicant' => [
                'string',
                'required',
            ],
            'applicant_citizenship' => [
                'required',
            ],
            'email_address' => [
                'string',
                'nullable',
            ],
            'phone_or_mobile_nu' => [
                'string',
                'nullable',
            ],
            'work_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
