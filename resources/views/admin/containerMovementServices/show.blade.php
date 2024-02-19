@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.containerMovementService.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.container-movement-services.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.container_no') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->container_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.service') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->service }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lease_lessor') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->lease_lessor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.vessel') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ContainerMovementService::VESSEL_SELECT[$containerMovementService->vessel] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.mov_code') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ContainerMovementService::MOV_CODE_SELECT[$containerMovementService->mov_code] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.consignee') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->consignee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.dchf') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->dchf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.devan') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->devan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.sntc') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->sntc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.snts') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->snts }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.rcve') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->rcve }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.rcvf') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->rcvf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lode') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->lode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.lodf') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->lodf }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.sntb') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->sntb }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.location') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ContainerMovementService::LOCATION_SELECT[$containerMovementService->location] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.containerMovementService.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $containerMovementService->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.container-movement-services.index') }}">
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