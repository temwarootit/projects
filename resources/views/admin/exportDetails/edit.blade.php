@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.exportDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.export-details.update", [$exportDetail->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name_island_to_harvest_for_sea_cucumber') ? 'has-error' : '' }}">
                            <label for="name_island_to_harvest_for_sea_cucumber">{{ trans('cruds.exportDetail.fields.name_island_to_harvest_for_sea_cucumber') }}</label>
                            <input class="form-control" type="text" name="name_island_to_harvest_for_sea_cucumber" id="name_island_to_harvest_for_sea_cucumber" value="{{ old('name_island_to_harvest_for_sea_cucumber', $exportDetail->name_island_to_harvest_for_sea_cucumber) }}">
                            @if($errors->has('name_island_to_harvest_for_sea_cucumber'))
                                <span class="help-block" role="alert">{{ $errors->first('name_island_to_harvest_for_sea_cucumber') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.name_island_to_harvest_for_sea_cucumber_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('island_council_concerned') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.exportDetail.fields.island_council_concerned') }}</label>
                            <select class="form-control" name="island_council_concerned" id="island_council_concerned">
                                <option value disabled {{ old('island_council_concerned', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ExportDetail::ISLAND_COUNCIL_CONCERNED_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('island_council_concerned', $exportDetail->island_council_concerned) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('island_council_concerned'))
                                <span class="help-block" role="alert">{{ $errors->first('island_council_concerned') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.island_council_concerned_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('are_you_going_to_export_sea_cucumber') ? 'has-error' : '' }}">
                            <label class="required" for="are_you_going_to_export_sea_cucumber">{{ trans('cruds.exportDetail.fields.are_you_going_to_export_sea_cucumber') }}</label>
                            <input class="form-control" type="text" name="are_you_going_to_export_sea_cucumber" id="are_you_going_to_export_sea_cucumber" value="{{ old('are_you_going_to_export_sea_cucumber', $exportDetail->are_you_going_to_export_sea_cucumber) }}" required>
                            @if($errors->has('are_you_going_to_export_sea_cucumber'))
                                <span class="help-block" role="alert">{{ $errors->first('are_you_going_to_export_sea_cucumber') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.are_you_going_to_export_sea_cucumber_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('target_species_exported') ? 'has-error' : '' }}">
                            <label class="required" for="target_species_exported">{{ trans('cruds.exportDetail.fields.target_species_exported') }}</label>
                            <input class="form-control" type="text" name="target_species_exported" id="target_species_exported" value="{{ old('target_species_exported', $exportDetail->target_species_exported) }}" required>
                            @if($errors->has('target_species_exported'))
                                <span class="help-block" role="alert">{{ $errors->first('target_species_exported') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.target_species_exported_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quota_requested_to_be_exported') ? 'has-error' : '' }}">
                            <label class="required" for="quota_requested_to_be_exported">{{ trans('cruds.exportDetail.fields.quota_requested_to_be_exported') }}</label>
                            <input class="form-control" type="text" name="quota_requested_to_be_exported" id="quota_requested_to_be_exported" value="{{ old('quota_requested_to_be_exported', $exportDetail->quota_requested_to_be_exported) }}" required>
                            @if($errors->has('quota_requested_to_be_exported'))
                                <span class="help-block" role="alert">{{ $errors->first('quota_requested_to_be_exported') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.quota_requested_to_be_exported_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fishing_method') ? 'has-error' : '' }}">
                            <label class="required" for="fishing_method">{{ trans('cruds.exportDetail.fields.fishing_method') }}</label>
                            <input class="form-control" type="text" name="fishing_method" id="fishing_method" value="{{ old('fishing_method', $exportDetail->fishing_method) }}" required>
                            @if($errors->has('fishing_method'))
                                <span class="help-block" role="alert">{{ $errors->first('fishing_method') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.fishing_method_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('local_harvesters') ? 'has-error' : '' }}">
                            <label for="local_harvesters">{{ trans('cruds.exportDetail.fields.local_harvesters') }}</label>
                            <div class="needsclick dropzone" id="local_harvesters-dropzone">
                            </div>
                            @if($errors->has('local_harvesters'))
                                <span class="help-block" role="alert">{{ $errors->first('local_harvesters') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.exportDetail.fields.local_harvesters_helper') }}</span>
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
    Dropzone.options.localHarvestersDropzone = {
    url: '{{ route('admin.export-details.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="local_harvesters"]').remove()
      $('form').append('<input type="hidden" name="local_harvesters" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="local_harvesters"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exportDetail) && $exportDetail->local_harvesters)
      var file = {!! json_encode($exportDetail->local_harvesters) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="local_harvesters" value="' + file.file_name + '">')
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
@endsection