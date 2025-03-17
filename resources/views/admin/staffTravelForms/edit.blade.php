@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.staffTravelForm.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.staff-travel-forms.update", [$staffTravelForm->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('full_name_of_staff') ? 'has-error' : '' }}">
                            <label class="required" for="full_name_of_staff">{{ trans('cruds.staffTravelForm.fields.full_name_of_staff') }}</label>
                            <input class="form-control" type="text" name="full_name_of_staff" id="full_name_of_staff" value="{{ old('full_name_of_staff', $staffTravelForm->full_name_of_staff) }}" required>
                            @if($errors->has('full_name_of_staff'))
                                <span class="help-block" role="alert">{{ $errors->first('full_name_of_staff') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.full_name_of_staff_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('staff_designation') ? 'has-error' : '' }}">
                            <label class="required" for="staff_designation">{{ trans('cruds.staffTravelForm.fields.staff_designation') }}</label>
                            <input class="form-control" type="text" name="staff_designation" id="staff_designation" value="{{ old('staff_designation', $staffTravelForm->staff_designation) }}" required>
                            @if($errors->has('staff_designation'))
                                <span class="help-block" role="alert">{{ $errors->first('staff_designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.staff_designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('staff_gender') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.staffTravelForm.fields.staff_gender') }}</label>
                            @foreach(App\Models\StaffTravelForm::STAFF_GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="staff_gender_{{ $key }}" name="staff_gender" value="{{ $key }}" {{ old('staff_gender', $staffTravelForm->staff_gender) === (string) $key ? 'checked' : '' }} required>
                                    <label for="staff_gender_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('staff_gender'))
                                <span class="help-block" role="alert">{{ $errors->first('staff_gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.staff_gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name_of_division') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.staffTravelForm.fields.name_of_division') }}</label>
                            <select class="form-control" name="name_of_division" id="name_of_division" required>
                                <option value disabled {{ old('name_of_division', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\StaffTravelForm::NAME_OF_DIVISION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('name_of_division', $staffTravelForm->name_of_division) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('name_of_division'))
                                <span class="help-block" role="alert">{{ $errors->first('name_of_division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.name_of_division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('purpose_of_travel') ? 'has-error' : '' }}">
                            <label class="required" for="purpose_of_travel">{{ trans('cruds.staffTravelForm.fields.purpose_of_travel') }}</label>
                            <input class="form-control" type="text" name="purpose_of_travel" id="purpose_of_travel" value="{{ old('purpose_of_travel', $staffTravelForm->purpose_of_travel) }}" required>
                            @if($errors->has('purpose_of_travel'))
                                <span class="help-block" role="alert">{{ $errors->first('purpose_of_travel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.purpose_of_travel_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('source_of_fund') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.staffTravelForm.fields.source_of_fund') }}</label>
                            <select class="form-control" name="source_of_fund" id="source_of_fund" required>
                                <option value disabled {{ old('source_of_fund', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\StaffTravelForm::SOURCE_OF_FUND_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('source_of_fund', $staffTravelForm->source_of_fund) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('source_of_fund'))
                                <span class="help-block" role="alert">{{ $errors->first('source_of_fund') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.source_of_fund_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_departure') ? 'has-error' : '' }}">
                            <label class="required" for="date_of_departure">{{ trans('cruds.staffTravelForm.fields.date_of_departure') }}</label>
                            <input class="form-control date" type="text" name="date_of_departure" id="date_of_departure" value="{{ old('date_of_departure', $staffTravelForm->date_of_departure) }}" required>
                            @if($errors->has('date_of_departure'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_departure') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.date_of_departure_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number_of_absent_in_days') ? 'has-error' : '' }}">
                            <label class="required" for="number_of_absent_in_days">{{ trans('cruds.staffTravelForm.fields.number_of_absent_in_days') }}</label>
                            <input class="form-control" type="text" name="number_of_absent_in_days" id="number_of_absent_in_days" value="{{ old('number_of_absent_in_days', $staffTravelForm->number_of_absent_in_days) }}" required>
                            @if($errors->has('number_of_absent_in_days'))
                                <span class="help-block" role="alert">{{ $errors->first('number_of_absent_in_days') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.number_of_absent_in_days_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('return_date') ? 'has-error' : '' }}">
                            <label class="required" for="return_date">{{ trans('cruds.staffTravelForm.fields.return_date') }}</label>
                            <input class="form-control date" type="text" name="return_date" id="return_date" value="{{ old('return_date', $staffTravelForm->return_date) }}" required>
                            @if($errors->has('return_date'))
                                <span class="help-block" role="alert">{{ $errors->first('return_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.return_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('travel_destination') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.staffTravelForm.fields.travel_destination') }}</label>
                            @foreach(App\Models\StaffTravelForm::TRAVEL_DESTINATION_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="travel_destination_{{ $key }}" name="travel_destination" value="{{ $key }}" {{ old('travel_destination', $staffTravelForm->travel_destination) === (string) $key ? 'checked' : '' }}>
                                    <label for="travel_destination_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('travel_destination'))
                                <span class="help-block" role="alert">{{ $errors->first('travel_destination') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.staffTravelForm.fields.travel_destination_helper') }}</span>
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