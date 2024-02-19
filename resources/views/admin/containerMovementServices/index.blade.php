@extends('layouts.admin')
@section('content')
<div class="content">
    @can('container_movement_service_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.container-movement-services.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.containerMovementService.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.containerMovementService.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ContainerMovementService">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.container_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.service') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lease_lessor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.vessel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.mov_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.consignee') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.dchf') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.devan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.sntc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.snts') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.rcve') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.rcvf') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lodf') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.sntb') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.location') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($containerMovementServices as $key => $containerMovementService)
                                    <tr data-entry-id="{{ $containerMovementService->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $containerMovementService->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->container_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->service ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->lease_lessor ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ContainerMovementService::VESSEL_SELECT[$containerMovementService->vessel] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ContainerMovementService::MOV_CODE_SELECT[$containerMovementService->mov_code] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->consignee ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->dchf ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->devan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->sntc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->snts ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->rcve ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->rcvf ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->lode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->lodf ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->sntb ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ContainerMovementService::LOCATION_SELECT[$containerMovementService->location] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $containerMovementService->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('container_movement_service_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.container-movement-services.show', $containerMovementService->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('container_movement_service_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.container-movement-services.edit', $containerMovementService->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('container_movement_service_delete')
                                                <form action="{{ route('admin.container-movement-services.destroy', $containerMovementService->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('container_movement_service_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.container-movement-services.massDestroy') }}",
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
  let table = $('.datatable-ContainerMovementService:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection