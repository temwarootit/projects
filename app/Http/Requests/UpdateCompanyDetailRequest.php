<?php

namespace App\Http\Requests;

use App\Models\CompanyDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_detail_edit');
    }

    public function rules()
    {
        return [
            'local_business_registration_name' => [
                'string',
                'nullable',
            ],
            'type_of_company' => [
                'string',
                'required',
            ],
            'date_of_establishment' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'registered_address' => [
                'string',
                'required',
            ],
            'business_activities' => [
                'string',
                'required',
            ],
            'foreign_investment_license' => [
                'string',
                'nullable',
            ],
            'are_you_renewing_your_sea_cucumber_export_license' => [
                'required',
            ],
            'have_you_previously_exported_sea_cucumber' => [
                'required',
            ],
            'how_long_have_been_involved_in_this_business' => [
                'string',
                'required',
            ],
            'details_of_fisher' => [
                'array',
            ],
        ];
    }
}
