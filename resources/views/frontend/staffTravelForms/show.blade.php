@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.staffTravelForm.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.staff-travel-forms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.full_name_of_staff') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->full_name_of_staff }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.staff_designation') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->staff_designation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.staff_gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\StaffTravelForm::STAFF_GENDER_RADIO[$staffTravelForm->staff_gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.name_of_division') }}
                                    </th>
                                    <td>
                                        {{ App\Models\StaffTravelForm::NAME_OF_DIVISION_SELECT[$staffTravelForm->name_of_division] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.purpose_of_travel') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->purpose_of_travel }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.source_of_fund') }}
                                    </th>
                                    <td>
                                        {{ App\Models\StaffTravelForm::SOURCE_OF_FUND_SELECT[$staffTravelForm->source_of_fund] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.date_of_departure') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->date_of_departure }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.number_of_absent_in_days') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->number_of_absent_in_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.return_date') }}
                                    </th>
                                    <td>
                                        {{ $staffTravelForm->return_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.travel_destination') }}
                                    </th>
                                    <td>
                                        {{ App\Models\StaffTravelForm::TRAVEL_DESTINATION_RADIO[$staffTravelForm->travel_destination] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.staff-travel-forms.index') }}">
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