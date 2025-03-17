@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('staff_travel_form_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.staff-travel-forms.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.staffTravelForm.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.staffTravelForm.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-StaffTravelForm">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.full_name_of_staff') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.staff_designation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.staff_gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.name_of_division') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.purpose_of_travel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.source_of_fund') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.date_of_departure') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.number_of_absent_in_days') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.return_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.staffTravelForm.fields.travel_destination') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffTravelForms as $key => $staffTravelForm)
                                    <tr data-entry-id="{{ $staffTravelForm->id }}">
                                        <td>
                                            {{ $staffTravelForm->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->full_name_of_staff ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->staff_designation ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\StaffTravelForm::STAFF_GENDER_RADIO[$staffTravelForm->staff_gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\StaffTravelForm::NAME_OF_DIVISION_SELECT[$staffTravelForm->name_of_division] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->purpose_of_travel ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\StaffTravelForm::SOURCE_OF_FUND_SELECT[$staffTravelForm->source_of_fund] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->date_of_departure ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->number_of_absent_in_days ?? '' }}
                                        </td>
                                        <td>
                                            {{ $staffTravelForm->return_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\StaffTravelForm::TRAVEL_DESTINATION_RADIO[$staffTravelForm->travel_destination] ?? '' }}
                                        </td>
                                        <td>
                                            @can('staff_travel_form_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.staff-travel-forms.show', $staffTravelForm->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('staff_travel_form_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.staff-travel-forms.edit', $staffTravelForm->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('staff_travel_form_delete')
                                                <form action="{{ route('frontend.staff-travel-forms.destroy', $staffTravelForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('staff_travel_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.staff-travel-forms.massDestroy') }}",
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
  let table = $('.datatable-StaffTravelForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection