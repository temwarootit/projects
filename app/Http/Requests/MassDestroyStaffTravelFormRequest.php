<?php

namespace App\Http\Requests;

use App\Models\StaffTravelForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStaffTravelFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('staff_travel_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:staff_travel_forms,id',
        ];
    }
}
