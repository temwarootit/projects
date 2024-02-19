<?php

namespace App\Http\Requests;

use App\Models\ContainerMovementService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContainerMovementServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('container_movement_service_edit');
    }

    public function rules()
    {
        return [
            'container_no' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
            'service' => [
                'string',
                'required',
            ],
            'lease_lessor' => [
                'string',
                'required',
            ],
            'consignee' => [
                'string',
                'required',
            ],
            'dchf' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'devan' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'sntc' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'snts' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rcve' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rcvf' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'lode' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'lodf' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'sntb' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'remarks' => [
                'string',
                'max:900',
                'required',
            ],
        ];
    }
}
