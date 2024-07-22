<?php

namespace App\Http\Requests;

use App\Models\ExportDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExportDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('export_detail_create');
    }

    public function rules()
    {
        return [
            'name_island_to_harvest_for_sea_cucumber' => [
                'string',
                'nullable',
            ],
            'are_you_going_to_export_sea_cucumber' => [
                'string',
                'required',
            ],
            'target_species_exported' => [
                'string',
                'required',
            ],
            'quota_requested_to_be_exported' => [
                'string',
                'required',
            ],
            'fishing_method' => [
                'string',
                'required',
            ],
        ];
    }
}
