@extends('layouts.admin')
@section('content')
<div class="content">
    @can('company_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.company-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.companyDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.companyDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CompanyDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.local_business_registration_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.type_of_company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.date_of_establishment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.registered_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_activities') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.foreign_investment_license') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_license') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.are_you_renewing_your_sea_cucumber_export_license') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.have_you_previously_exported_sea_cucumber') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.how_long_have_been_involved_in_this_business') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.business_plan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.companyDetail.fields.details_of_fisher') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companyDetails as $key => $companyDetail)
                                    <tr data-entry-id="{{ $companyDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $companyDetail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->local_business_registration_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->type_of_company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->date_of_establishment ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->registered_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->business_activities ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->foreign_investment_license ?? '' }}
                                        </td>
                                        <td>
                                            @if($companyDetail->business_license)
                                                <a href="{{ $companyDetail->business_license->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Models\CompanyDetail::ARE_YOU_RENEWING_YOUR_SEA_CUCUMBER_EXPORT_LICENSE_SELECT[$companyDetail->are_you_renewing_your_sea_cucumber_export_license] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\CompanyDetail::HAVE_YOU_PREVIOUSLY_EXPORTED_SEA_CUCUMBER_SELECT[$companyDetail->have_you_previously_exported_sea_cucumber] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $companyDetail->how_long_have_been_involved_in_this_business ?? '' }}
                                        </td>
                                        <td>
                                            @if($companyDetail->business_plan)
                                                <a href="{{ $companyDetail->business_plan->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($companyDetail->details_of_fisher as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('company_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.company-details.show', $companyDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('company_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.company-details.edit', $companyDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('company_detail_delete')
                                                <form action="{{ route('admin.company-details.destroy', $companyDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('company_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.company-details.massDestroy') }}",
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
  let table = $('.datatable-CompanyDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection