<?php

namespace App\Http\Requests;

use App\Models\ComplianceInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateComplianceInformationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('compliance_information_edit');
    }

    public function rules()
    {
        return [];
    }
}
