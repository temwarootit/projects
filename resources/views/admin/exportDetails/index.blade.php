@extends('layouts.admin')
@section('content')
<div class="content">
    @can('export_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.export-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.exportDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.exportDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExportDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.name_island_to_harvest_for_sea_cucumber') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.island_council_concerned') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.are_you_going_to_export_sea_cucumber') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.target_species_exported') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.quota_requested_to_be_exported') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.fishing_method') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.local_harvesters') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exportDetails as $key => $exportDetail)
                                    <tr data-entry-id="{{ $exportDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $exportDetail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exportDetail->name_island_to_harvest_for_sea_cucumber ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ExportDetail::ISLAND_COUNCIL_CONCERNED_SELECT[$exportDetail->island_council_concerned] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exportDetail->are_you_going_to_export_sea_cucumber ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exportDetail->target_species_exported ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exportDetail->quota_requested_to_be_exported ?? '' }}
                                        </td>
                                        <td>
                                            {{ $exportDetail->fishing_method ?? '' }}
                                        </td>
                                        <td>
                                            @if($exportDetail->local_harvesters)
                                                <a href="{{ $exportDetail->local_harvesters->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('export_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.export-details.show', $exportDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('export_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.export-details.edit', $exportDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('export_detail_delete')
                                                <form action="{{ route('admin.export-details.destroy', $exportDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('export_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.export-details.massDestroy') }}",
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
  let table = $('.datatable-ExportDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection