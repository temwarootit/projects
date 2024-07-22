@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.submissionChecklist.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.submission-checklists.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('applicant_identification_card_passport_copy') ? 'has-error' : '' }}">
                            <label for="applicant_identification_card_passport_copy">{{ trans('cruds.submissionChecklist.fields.applicant_identification_card_passport_copy') }}</label>
                            <div class="needsclick dropzone" id="applicant_identification_card_passport_copy-dropzone">
                            </div>
                            @if($errors->has('applicant_identification_card_passport_copy'))
                                <span class="help-block" role="alert">{{ $errors->first('applicant_identification_card_passport_copy') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.applicant_identification_card_passport_copy_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('police_clearance') ? 'has-error' : '' }}">
                            <label for="police_clearance">{{ trans('cruds.submissionChecklist.fields.police_clearance') }}</label>
                            <div class="needsclick dropzone" id="police_clearance-dropzone">
                            </div>
                            @if($errors->has('police_clearance'))
                                <span class="help-block" role="alert">{{ $errors->first('police_clearance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.police_clearance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_registration_certificate') ? 'has-error' : '' }}">
                            <label for="business_registration_certificate">{{ trans('cruds.submissionChecklist.fields.business_registration_certificate') }}</label>
                            <div class="needsclick dropzone" id="business_registration_certificate-dropzone">
                            </div>
                            @if($errors->has('business_registration_certificate'))
                                <span class="help-block" role="alert">{{ $errors->first('business_registration_certificate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.business_registration_certificate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('foreign_investment_license_certificate') ? 'has-error' : '' }}">
                            <label for="foreign_investment_license_certificate">{{ trans('cruds.submissionChecklist.fields.foreign_investment_license_certificate') }}</label>
                            <div class="needsclick dropzone" id="foreign_investment_license_certificate-dropzone">
                            </div>
                            @if($errors->has('foreign_investment_license_certificate'))
                                <span class="help-block" role="alert">{{ $errors->first('foreign_investment_license_certificate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.foreign_investment_license_certificate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_local_license_certificate') ? 'has-error' : '' }}">
                            <label for="business_local_license_certificate">{{ trans('cruds.submissionChecklist.fields.business_local_license_certificate') }}</label>
                            <div class="needsclick dropzone" id="business_local_license_certificate-dropzone">
                            </div>
                            @if($errors->has('business_local_license_certificate'))
                                <span class="help-block" role="alert">{{ $errors->first('business_local_license_certificate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.business_local_license_certificate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('financial_background') ? 'has-error' : '' }}">
                            <label for="financial_background">{{ trans('cruds.submissionChecklist.fields.financial_background') }}</label>
                            <div class="needsclick dropzone" id="financial_background-dropzone">
                            </div>
                            @if($errors->has('financial_background'))
                                <span class="help-block" role="alert">{{ $errors->first('financial_background') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.financial_background_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('list_of_fishers_suppliers') ? 'has-error' : '' }}">
                            <label for="list_of_fishers_suppliers">{{ trans('cruds.submissionChecklist.fields.list_of_fishers_suppliers') }}</label>
                            <div class="needsclick dropzone" id="list_of_fishers_suppliers-dropzone">
                            </div>
                            @if($errors->has('list_of_fishers_suppliers'))
                                <span class="help-block" role="alert">{{ $errors->first('list_of_fishers_suppliers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.list_of_fishers_suppliers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('listfishers') ? 'has-error' : '' }}">
                            <label for="listfishers">{{ trans('cruds.submissionChecklist.fields.listfishers') }}</label>
                            <div class="needsclick dropzone" id="listfishers-dropzone">
                            </div>
                            @if($errors->has('listfishers'))
                                <span class="help-block" role="alert">{{ $errors->first('listfishers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.listfishers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="photo">{{ trans('cruds.submissionChecklist.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionChecklist.fields.photo_helper') }}</span>
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
    var uploadedApplicantIdentificationCardPassportCopyMap = {}
Dropzone.options.applicantIdentificationCardPassportCopyDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="applicant_identification_card_passport_copy[]" value="' + response.name + '">')
      uploadedApplicantIdentificationCardPassportCopyMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedApplicantIdentificationCardPassportCopyMap[file.name]
      }
      $('form').find('input[name="applicant_identification_card_passport_copy[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->applicant_identification_card_passport_copy)
          var files =
            {!! json_encode($submissionChecklist->applicant_identification_card_passport_copy) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="applicant_identification_card_passport_copy[]" value="' + file.file_name + '">')
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
<script>
    var uploadedPoliceClearanceMap = {}
Dropzone.options.policeClearanceDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="police_clearance[]" value="' + response.name + '">')
      uploadedPoliceClearanceMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPoliceClearanceMap[file.name]
      }
      $('form').find('input[name="police_clearance[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->police_clearance)
          var files =
            {!! json_encode($submissionChecklist->police_clearance) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="police_clearance[]" value="' + file.file_name + '">')
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
<script>
    var uploadedBusinessRegistrationCertificateMap = {}
Dropzone.options.businessRegistrationCertificateDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="business_registration_certificate[]" value="' + response.name + '">')
      uploadedBusinessRegistrationCertificateMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBusinessRegistrationCertificateMap[file.name]
      }
      $('form').find('input[name="business_registration_certificate[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->business_registration_certificate)
          var files =
            {!! json_encode($submissionChecklist->business_registration_certificate) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="business_registration_certificate[]" value="' + file.file_name + '">')
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
<script>
    var uploadedForeignInvestmentLicenseCertificateMap = {}
Dropzone.options.foreignInvestmentLicenseCertificateDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="foreign_investment_license_certificate[]" value="' + response.name + '">')
      uploadedForeignInvestmentLicenseCertificateMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedForeignInvestmentLicenseCertificateMap[file.name]
      }
      $('form').find('input[name="foreign_investment_license_certificate[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->foreign_investment_license_certificate)
          var files =
            {!! json_encode($submissionChecklist->foreign_investment_license_certificate) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="foreign_investment_license_certificate[]" value="' + file.file_name + '">')
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
<script>
    var uploadedBusinessLocalLicenseCertificateMap = {}
Dropzone.options.businessLocalLicenseCertificateDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="business_local_license_certificate[]" value="' + response.name + '">')
      uploadedBusinessLocalLicenseCertificateMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBusinessLocalLicenseCertificateMap[file.name]
      }
      $('form').find('input[name="business_local_license_certificate[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->business_local_license_certificate)
          var files =
            {!! json_encode($submissionChecklist->business_local_license_certificate) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="business_local_license_certificate[]" value="' + file.file_name + '">')
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
<script>
    var uploadedFinancialBackgroundMap = {}
Dropzone.options.financialBackgroundDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="financial_background[]" value="' + response.name + '">')
      uploadedFinancialBackgroundMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFinancialBackgroundMap[file.name]
      }
      $('form').find('input[name="financial_background[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->financial_background)
          var files =
            {!! json_encode($submissionChecklist->financial_background) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="financial_background[]" value="' + file.file_name + '">')
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
<script>
    var uploadedListOfFishersSuppliersMap = {}
Dropzone.options.listOfFishersSuppliersDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="list_of_fishers_suppliers[]" value="' + response.name + '">')
      uploadedListOfFishersSuppliersMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedListOfFishersSuppliersMap[file.name]
      }
      $('form').find('input[name="list_of_fishers_suppliers[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->list_of_fishers_suppliers)
          var files =
            {!! json_encode($submissionChecklist->list_of_fishers_suppliers) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="list_of_fishers_suppliers[]" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.listfishersDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="listfishers"]').remove()
      $('form').append('<input type="hidden" name="listfishers" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="listfishers"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->listfishers)
      var file = {!! json_encode($submissionChecklist->listfishers) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="listfishers" value="' + file.file_name + '">')
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
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.submission-checklists.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($submissionChecklist) && $submissionChecklist->photo)
      var files = {!! json_encode($submissionChecklist->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
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