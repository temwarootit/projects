<?php

namespace App\Http\Requests;

use App\Models\SubmissionChecklist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubmissionChecklistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('submission_checklist_edit');
    }

    public function rules()
    {
        return [
            'applicant_identification_card_passport_copy' => [
                'array',
            ],
            'police_clearance' => [
                'array',
            ],
            'business_registration_certificate' => [
                'array',
            ],
            'foreign_investment_license_certificate' => [
                'array',
            ],
            'business_local_license_certificate' => [
                'array',
            ],
            'financial_background' => [
                'array',
            ],
            'list_of_fishers_suppliers' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
