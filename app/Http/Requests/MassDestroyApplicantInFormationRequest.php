<?php

namespace App\Http\Requests;

use App\Models\ApplicantInFormation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyApplicantInFormationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('applicant_in_formation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:applicant_in_formations,id',
        ];
    }
}
