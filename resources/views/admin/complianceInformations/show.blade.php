@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.complianceInformation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.compliance-informations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.complianceInformation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $complianceInformation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.complianceInformation.fields.aware_of_international_law') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ComplianceInformation::AWARE_OF_INTERNATIONAL_LAW_SELECT[$complianceInformation->aware_of_international_law] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.complianceInformation.fields.fisheries_related_offences') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ComplianceInformation::FISHERIES_RELATED_OFFENCES_SELECT[$complianceInformation->fisheries_related_offences] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.compliance-informations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection