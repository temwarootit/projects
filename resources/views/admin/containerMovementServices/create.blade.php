@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.containerMovementService.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.container-movement-services.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('container_no') ? 'has-error' : '' }}">
                            <label class="required" for="container_no">{{ trans('cruds.containerMovementService.fields.container_no') }}</label>
                            <input class="form-control" type="text" name="container_no" id="container_no" value="{{ old('container_no', '') }}" required>
                            @if($errors->has('container_no'))
                                <span class="help-block" role="alert">{{ $errors->first('container_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.container_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="required" for="type">{{ trans('cruds.containerMovementService.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', '') }}" required>
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
                            <label class="required" for="service">{{ trans('cruds.containerMovementService.fields.service') }}</label>
                            <input class="form-control" type="text" name="service" id="service" value="{{ old('service', '') }}" required>
                            @if($errors->has('service'))
                                <span class="help-block" role="alert">{{ $errors->first('service') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lease_lessor') ? 'has-error' : '' }}">
                            <label class="required" for="lease_lessor">{{ trans('cruds.containerMovementService.fields.lease_lessor') }}</label>
                            <input class="form-control" type="text" name="lease_lessor" id="lease_lessor" value="{{ old('lease_lessor', '') }}" required>
                            @if($errors->has('lease_lessor'))
                                <span class="help-block" role="alert">{{ $errors->first('lease_lessor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.lease_lessor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vessel') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.containerMovementService.fields.vessel') }}</label>
                            <select class="form-control" name="vessel" id="vessel">
                                <option value disabled {{ old('vessel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ContainerMovementService::VESSEL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('vessel', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vessel'))
                                <span class="help-block" role="alert">{{ $errors->first('vessel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.vessel_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mov_code') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.containerMovementService.fields.mov_code') }}</label>
                            <select class="form-control" name="mov_code" id="mov_code">
                                <option value disabled {{ old('mov_code', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ContainerMovementService::MOV_CODE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mov_code', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mov_code'))
                                <span class="help-block" role="alert">{{ $errors->first('mov_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.mov_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('consignee') ? 'has-error' : '' }}">
                            <label class="required" for="consignee">{{ trans('cruds.containerMovementService.fields.consignee') }}</label>
                            <input class="form-control" type="text" name="consignee" id="consignee" value="{{ old('consignee', '') }}" required>
                            @if($errors->has('consignee'))
                                <span class="help-block" role="alert">{{ $errors->first('consignee') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.consignee_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dchf') ? 'has-error' : '' }}">
                            <label for="dchf">{{ trans('cruds.containerMovementService.fields.dchf') }}</label>
                            <input class="form-control date" type="text" name="dchf" id="dchf" value="{{ old('dchf') }}">
                            @if($errors->has('dchf'))
                                <span class="help-block" role="alert">{{ $errors->first('dchf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.dchf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('devan') ? 'has-error' : '' }}">
                            <label for="devan">{{ trans('cruds.containerMovementService.fields.devan') }}</label>
                            <input class="form-control date" type="text" name="devan" id="devan" value="{{ old('devan') }}">
                            @if($errors->has('devan'))
                                <span class="help-block" role="alert">{{ $errors->first('devan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.devan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sntc') ? 'has-error' : '' }}">
                            <label for="sntc">{{ trans('cruds.containerMovementService.fields.sntc') }}</label>
                            <input class="form-control date" type="text" name="sntc" id="sntc" value="{{ old('sntc') }}">
                            @if($errors->has('sntc'))
                                <span class="help-block" role="alert">{{ $errors->first('sntc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.sntc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('snts') ? 'has-error' : '' }}">
                            <label for="snts">{{ trans('cruds.containerMovementService.fields.snts') }}</label>
                            <input class="form-control date" type="text" name="snts" id="snts" value="{{ old('snts') }}">
                            @if($errors->has('snts'))
                                <span class="help-block" role="alert">{{ $errors->first('snts') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.snts_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rcve') ? 'has-error' : '' }}">
                            <label for="rcve">{{ trans('cruds.containerMovementService.fields.rcve') }}</label>
                            <input class="form-control date" type="text" name="rcve" id="rcve" value="{{ old('rcve') }}">
                            @if($errors->has('rcve'))
                                <span class="help-block" role="alert">{{ $errors->first('rcve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.rcve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rcvf') ? 'has-error' : '' }}">
                            <label for="rcvf">{{ trans('cruds.containerMovementService.fields.rcvf') }}</label>
                            <input class="form-control date" type="text" name="rcvf" id="rcvf" value="{{ old('rcvf') }}">
                            @if($errors->has('rcvf'))
                                <span class="help-block" role="alert">{{ $errors->first('rcvf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.rcvf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lode') ? 'has-error' : '' }}">
                            <label for="lode">{{ trans('cruds.containerMovementService.fields.lode') }}</label>
                            <input class="form-control date" type="text" name="lode" id="lode" value="{{ old('lode') }}">
                            @if($errors->has('lode'))
                                <span class="help-block" role="alert">{{ $errors->first('lode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.lode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lodf') ? 'has-error' : '' }}">
                            <label for="lodf">{{ trans('cruds.containerMovementService.fields.lodf') }}</label>
                            <input class="form-control date" type="text" name="lodf" id="lodf" value="{{ old('lodf') }}">
                            @if($errors->has('lodf'))
                                <span class="help-block" role="alert">{{ $errors->first('lodf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.lodf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sntb') ? 'has-error' : '' }}">
                            <label for="sntb">{{ trans('cruds.containerMovementService.fields.sntb') }}</label>
                            <input class="form-control date" type="text" name="sntb" id="sntb" value="{{ old('sntb') }}">
                            @if($errors->has('sntb'))
                                <span class="help-block" role="alert">{{ $errors->first('sntb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.sntb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.containerMovementService.fields.location') }}</label>
                            <select class="form-control" name="location" id="location">
                                <option value disabled {{ old('location', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ContainerMovementService::LOCATION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('location', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                            <label class="required" for="remarks">{{ trans('cruds.containerMovementService.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}" required>
                            @if($errors->has('remarks'))
                                <span class="help-block" role="alert">{{ $errors->first('remarks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.containerMovementService.fields.remarks_helper') }}</span>
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