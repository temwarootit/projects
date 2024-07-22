@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.exportDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.export-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.name_island_to_harvest_for_sea_cucumber') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->name_island_to_harvest_for_sea_cucumber }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.island_council_concerned') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ExportDetail::ISLAND_COUNCIL_CONCERNED_SELECT[$exportDetail->island_council_concerned] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.are_you_going_to_export_sea_cucumber') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->are_you_going_to_export_sea_cucumber }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.target_species_exported') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->target_species_exported }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.quota_requested_to_be_exported') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->quota_requested_to_be_exported }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.fishing_method') }}
                                    </th>
                                    <td>
                                        {{ $exportDetail->fishing_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.exportDetail.fields.local_harvesters') }}
                                    </th>
                                    <td>
                                        @if($exportDetail->local_harvesters)
                                            <a href="{{ $exportDetail->local_harvesters->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.export-details.index') }}">
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