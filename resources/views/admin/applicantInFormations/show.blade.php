@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.applicantInFormation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.applicant-in-formations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $applicantInFormation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.full_name_of_applicant') }}
                                    </th>
                                    <td>
                                        {{ $applicantInFormation->full_name_of_applicant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.applicant_citizenship') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ApplicantInFormation::APPLICANT_CITIZENSHIP_SELECT[$applicantInFormation->applicant_citizenship] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.email_address') }}
                                    </th>
                                    <td>
                                        {{ $applicantInFormation->email_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.phone_or_mobile_nu') }}
                                    </th>
                                    <td>
                                        {{ $applicantInFormation->phone_or_mobile_nu }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.applicantInFormation.fields.work_address') }}
                                    </th>
                                    <td>
                                        {{ $applicantInFormation->work_address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.applicant-in-formations.index') }}">
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