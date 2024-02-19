<?php

namespace App\Http\Requests;

use App\Models\ContainerMovementService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContainerMovementServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('container_movement_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:container_movement_services,id',
        ];
    }
}
