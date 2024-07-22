@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.submissionChecklist.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.submission-checklists.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $submissionChecklist->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.applicant_identification_card_passport_copy') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->applicant_identification_card_passport_copy as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.police_clearance') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->police_clearance as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.business_registration_certificate') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->business_registration_certificate as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.foreign_investment_license_certificate') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->foreign_investment_license_certificate as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.business_local_license_certificate') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->business_local_license_certificate as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.financial_background') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->financial_background as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.list_of_fishers_suppliers') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->list_of_fishers_suppliers as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.listfishers') }}
                                    </th>
                                    <td>
                                        @if($submissionChecklist->listfishers)
                                            <a href="{{ $submissionChecklist->listfishers->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($submissionChecklist->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.submission-checklists.index') }}">
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