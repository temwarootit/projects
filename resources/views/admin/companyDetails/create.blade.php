@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.companyDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.company-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('local_business_registration_name') ? 'has-error' : '' }}">
                            <label for="local_business_registration_name">{{ trans('cruds.companyDetail.fields.local_business_registration_name') }}</label>
                            <input class="form-control" type="text" name="local_business_registration_name" id="local_business_registration_name" value="{{ old('local_business_registration_name', '') }}">
                            @if($errors->has('local_business_registration_name'))
                                <span class="help-block" role="alert">{{ $errors->first('local_business_registration_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.local_business_registration_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type_of_company') ? 'has-error' : '' }}">
                            <label class="required" for="type_of_company">{{ trans('cruds.companyDetail.fields.type_of_company') }}</label>
                            <input class="form-control" type="text" name="type_of_company" id="type_of_company" value="{{ old('type_of_company', '') }}" required>
                            @if($errors->has('type_of_company'))
                                <span class="help-block" role="alert">{{ $errors->first('type_of_company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.type_of_company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_establishment') ? 'has-error' : '' }}">
                            <label class="required" for="date_of_establishment">{{ trans('cruds.companyDetail.fields.date_of_establishment') }}</label>
                            <input class="form-control date" type="text" name="date_of_establishment" id="date_of_establishment" value="{{ old('date_of_establishment') }}" required>
                            @if($errors->has('date_of_establishment'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_establishment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.date_of_establishment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('registered_address') ? 'has-error' : '' }}">
                            <label class="required" for="registered_address">{{ trans('cruds.companyDetail.fields.registered_address') }}</label>
                            <input class="form-control" type="text" name="registered_address" id="registered_address" value="{{ old('registered_address', '') }}" required>
                            @if($errors->has('registered_address'))
                                <span class="help-block" role="alert">{{ $errors->first('registered_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.registered_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_activities') ? 'has-error' : '' }}">
                            <label class="required" for="business_activities">{{ trans('cruds.companyDetail.fields.business_activities') }}</label>
                            <input class="form-control" type="text" name="business_activities" id="business_activities" value="{{ old('business_activities', '') }}" required>
                            @if($errors->has('business_activities'))
                                <span class="help-block" role="alert">{{ $errors->first('business_activities') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.business_activities_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('foreign_investment_license') ? 'has-error' : '' }}">
                            <label for="foreign_investment_license">{{ trans('cruds.companyDetail.fields.foreign_investment_license') }}</label>
                            <input class="form-control" type="text" name="foreign_investment_license" id="foreign_investment_license" value="{{ old('foreign_investment_license', '') }}">
                            @if($errors->has('foreign_investment_license'))
                                <span class="help-block" role="alert">{{ $errors->first('foreign_investment_license') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.foreign_investment_license_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_license') ? 'has-error' : '' }}">
                            <label for="business_license">{{ trans('cruds.companyDetail.fields.business_license') }}</label>
                            <div class="needsclick dropzone" id="business_license-dropzone">
                            </div>
                            @if($errors->has('business_license'))
                                <span class="help-block" role="alert">{{ $errors->first('business_license') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.business_license_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('are_you_renewing_your_sea_cucumber_export_license') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.companyDetail.fields.are_you_renewing_your_sea_cucumber_export_license') }}</label>
                            <select class="form-control" name="are_you_renewing_your_sea_cucumber_export_license" id="are_you_renewing_your_sea_cucumber_export_license" required>
                                <option value disabled {{ old('are_you_renewing_your_sea_cucumber_export_license', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\CompanyDetail::ARE_YOU_RENEWING_YOUR_SEA_CUCUMBER_EXPORT_LICENSE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('are_you_renewing_your_sea_cucumber_export_license', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('are_you_renewing_your_sea_cucumber_export_license'))
                                <span class="help-block" role="alert">{{ $errors->first('are_you_renewing_your_sea_cucumber_export_license') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.are_you_renewing_your_sea_cucumber_export_license_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('have_you_previously_exported_sea_cucumber') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.companyDetail.fields.have_you_previously_exported_sea_cucumber') }}</label>
                            <select class="form-control" name="have_you_previously_exported_sea_cucumber" id="have_you_previously_exported_sea_cucumber" required>
                                <option value disabled {{ old('have_you_previously_exported_sea_cucumber', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\CompanyDetail::HAVE_YOU_PREVIOUSLY_EXPORTED_SEA_CUCUMBER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('have_you_previously_exported_sea_cucumber', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('have_you_previously_exported_sea_cucumber'))
                                <span class="help-block" role="alert">{{ $errors->first('have_you_previously_exported_sea_cucumber') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.have_you_previously_exported_sea_cucumber_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('how_long_have_been_involved_in_this_business') ? 'has-error' : '' }}">
                            <label class="required" for="how_long_have_been_involved_in_this_business">{{ trans('cruds.companyDetail.fields.how_long_have_been_involved_in_this_business') }}</label>
                            <input class="form-control" type="text" name="how_long_have_been_involved_in_this_business" id="how_long_have_been_involved_in_this_business" value="{{ old('how_long_have_been_involved_in_this_business', '') }}" required>
                            @if($errors->has('how_long_have_been_involved_in_this_business'))
                                <span class="help-block" role="alert">{{ $errors->first('how_long_have_been_involved_in_this_business') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.how_long_have_been_involved_in_this_business_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_plan') ? 'has-error' : '' }}">
                            <label for="business_plan">{{ trans('cruds.companyDetail.fields.business_plan') }}</label>
                            <div class="needsclick dropzone" id="business_plan-dropzone">
                            </div>
                            @if($errors->has('business_plan'))
                                <span class="help-block" role="alert">{{ $errors->first('business_plan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.business_plan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('details_of_fisher') ? 'has-error' : '' }}">
                            <label for="details_of_fisher">{{ trans('cruds.companyDetail.fields.details_of_fisher') }}</label>
                            <div class="needsclick dropzone" id="details_of_fisher-dropzone">
                            </div>
                            @if($errors->has('details_of_fisher'))
                                <span class="help-block" role="alert">{{ $errors->first('details_of_fisher') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.companyDetail.fields.details_of_fisher_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.businessLicenseDropzone = {
    url: '{{ route('admin.company-details.storeMedia') }}',
    maxFilesize: 12, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 12
    },
    success: function (file, response) {
      $('form').find('input[name="business_license"]').remove()
      $('form').append('<input type="hidden" name="business_license" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="business_license"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($companyDetail) && $companyDetail->business_license)
      var file = {!! json_encode($companyDetail->business_license) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="business_license" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.businessPlanDropzone = {
    url: '{{ route('admin.company-details.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="business_plan"]').remove()
      $('form').append('<input type="hidden" name="business_plan" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="business_plan"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($companyDetail) && $companyDetail->business_plan)
      var file = {!! json_encode($companyDetail->business_plan) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="business_plan" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedDetailsOfFisherMap = {}
Dropzone.options.detailsOfFisherDropzone = {
    url: '{{ route('admin.company-details.storeMedia') }}',
    maxFilesize: 12, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 12
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="details_of_fisher[]" value="' + response.name + '">')
      uploadedDetailsOfFisherMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDetailsOfFisherMap[file.name]
      }
      $('form').find('input[name="details_of_fisher[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($companyDetail) && $companyDetail->details_of_fisher)
          var files =
            {!! json_encode($companyDetail->details_of_fisher) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="details_of_fisher[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection