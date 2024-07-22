@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.complianceInformation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.compliance-informations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('aware_of_international_law') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.complianceInformation.fields.aware_of_international_law') }}</label>
                            <select class="form-control" name="aware_of_international_law" id="aware_of_international_law">
                                <option value disabled {{ old('aware_of_international_law', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ComplianceInformation::AWARE_OF_INTERNATIONAL_LAW_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('aware_of_international_law', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('aware_of_international_law'))
                                <span class="help-block" role="alert">{{ $errors->first('aware_of_international_law') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.complianceInformation.fields.aware_of_international_law_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fisheries_related_offences') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.complianceInformation.fields.fisheries_related_offences') }}</label>
                            <select class="form-control" name="fisheries_related_offences" id="fisheries_related_offences">
                                <option value disabled {{ old('fisheries_related_offences', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ComplianceInformation::FISHERIES_RELATED_OFFENCES_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('fisheries_related_offences', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fisheries_related_offences'))
                                <span class="help-block" role="alert">{{ $errors->first('fisheries_related_offences') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.complianceInformation.fields.fisheries_related_offences_helper') }}</span>
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