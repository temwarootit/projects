@extends('layouts.admin')
@section('content')
<div class="content">
    @can('submission_checklist_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.submission-checklists.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.submissionChecklist.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.submissionChecklist.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-SubmissionChecklist">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.applicant_identification_card_passport_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.police_clearance') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.business_registration_certificate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.foreign_investment_license_certificate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.business_local_license_certificate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.financial_background') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.list_of_fishers_suppliers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.listfishers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.submissionChecklist.fields.photo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissionChecklists as $key => $submissionChecklist)
                                    <tr data-entry-id="{{ $submissionChecklist->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $submissionChecklist->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->applicant_identification_card_passport_copy as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->police_clearance as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->business_registration_certificate as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->foreign_investment_license_certificate as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->business_local_license_certificate as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->financial_background as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->list_of_fishers_suppliers as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($submissionChecklist->listfishers)
                                                <a href="{{ $submissionChecklist->listfishers->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($submissionChecklist->photo as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('submission_checklist_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.submission-checklists.show', $submissionChecklist->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('submission_checklist_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.submission-checklists.edit', $submissionChecklist->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('submission_checklist_delete')
                                                <form action="{{ route('admin.submission-checklists.destroy', $submissionChecklist->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('submission_checklist_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.submission-checklists.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-SubmissionChecklist:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection