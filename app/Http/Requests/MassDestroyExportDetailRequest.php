<?php

namespace App\Http\Requests;

use App\Models\ExportDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExportDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('export_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:export_details,id',
        ];
    }
}
