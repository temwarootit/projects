@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.companyDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.company-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.local_business_registration_name') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->local_business_registration_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.type_of_company') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->type_of_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.date_of_establishment') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->date_of_establishment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.registered_address') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->registered_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_activities') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->business_activities }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.foreign_investment_license') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->foreign_investment_license }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_license') }}
                                    </th>
                                    <td>
                                        @if($companyDetail->business_license)
                                            <a href="{{ $companyDetail->business_license->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.are_you_renewing_your_sea_cucumber_export_license') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CompanyDetail::ARE_YOU_RENEWING_YOUR_SEA_CUCUMBER_EXPORT_LICENSE_SELECT[$companyDetail->are_you_renewing_your_sea_cucumber_export_license] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.have_you_previously_exported_sea_cucumber') }}
                                    </th>
                                    <td>
                                        {{ App\Models\CompanyDetail::HAVE_YOU_PREVIOUSLY_EXPORTED_SEA_CUCUMBER_SELECT[$companyDetail->have_you_previously_exported_sea_cucumber] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.how_long_have_been_involved_in_this_business') }}
                                    </th>
                                    <td>
                                        {{ $companyDetail->how_long_have_been_involved_in_this_business }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_plan') }}
                                    </th>
                                    <td>
                                        @if($companyDetail->business_plan)
                                            <a href="{{ $companyDetail->business_plan->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.details_of_fisher') }}
                                    </th>
                                    <td>
                                        @foreach($companyDetail->details_of_fisher as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.company-details.index') }}">
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