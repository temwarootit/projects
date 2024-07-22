@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.applicantInFormation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.applicant-in-formations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('full_name_of_applicant') ? 'has-error' : '' }}">
                            <label class="required" for="full_name_of_applicant">{{ trans('cruds.applicantInFormation.fields.full_name_of_applicant') }}</label>
                            <input class="form-control" type="text" name="full_name_of_applicant" id="full_name_of_applicant" value="{{ old('full_name_of_applicant', '') }}" required>
                            @if($errors->has('full_name_of_applicant'))
                                <span class="help-block" role="alert">{{ $errors->first('full_name_of_applicant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicantInFormation.fields.full_name_of_applicant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('applicant_citizenship') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.applicantInFormation.fields.applicant_citizenship') }}</label>
                            <select class="form-control" name="applicant_citizenship" id="applicant_citizenship" required>
                                <option value disabled {{ old('applicant_citizenship', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ApplicantInFormation::APPLICANT_CITIZENSHIP_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('applicant_citizenship', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('applicant_citizenship'))
                                <span class="help-block" role="alert">{{ $errors->first('applicant_citizenship') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicantInFormation.fields.applicant_citizenship_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email_address') ? 'has-error' : '' }}">
                            <label for="email_address">{{ trans('cruds.applicantInFormation.fields.email_address') }}</label>
                            <input class="form-control" type="text" name="email_address" id="email_address" value="{{ old('email_address', '') }}">
                            @if($errors->has('email_address'))
                                <span class="help-block" role="alert">{{ $errors->first('email_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicantInFormation.fields.email_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_or_mobile_nu') ? 'has-error' : '' }}">
                            <label for="phone_or_mobile_nu">{{ trans('cruds.applicantInFormation.fields.phone_or_mobile_nu') }}</label>
                            <input class="form-control" type="text" name="phone_or_mobile_nu" id="phone_or_mobile_nu" value="{{ old('phone_or_mobile_nu', '') }}">
                            @if($errors->has('phone_or_mobile_nu'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_or_mobile_nu') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicantInFormation.fields.phone_or_mobile_nu_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_address') ? 'has-error' : '' }}">
                            <label for="work_address">{{ trans('cruds.applicantInFormation.fields.work_address') }}</label>
                            <input class="form-control" type="text" name="work_address" id="work_address" value="{{ old('work_address', '') }}">
                            @if($errors->has('work_address'))
                                <span class="help-block" role="alert">{{ $errors->first('work_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.applicantInFormation.fields.work_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection