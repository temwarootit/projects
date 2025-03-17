<?php

namespace App\Http\Requests;

use App\Models\StaffTravelForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaffTravelFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staff_travel_form_edit');
    }

    public function rules()
    {
        return [
            'full_name_of_staff' => [
                'string',
                'required',
            ],
            'staff_designation' => [
                'string',
                'required',
            ],
            'staff_gender' => [
                'required',
            ],
            'name_of_division' => [
                'required',
            ],
            'purpose_of_travel' => [
                'string',
                'required',
            ],
            'source_of_fund' => [
                'required',
            ],
            'date_of_departure' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'number_of_absent_in_days' => [
                'string',
                'required',
            ],
            'return_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
