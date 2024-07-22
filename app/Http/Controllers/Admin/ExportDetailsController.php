<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExportDetailRequest;
use App\Http\Requests\StoreExportDetailRequest;
use App\Http\Requests\UpdateExportDetailRequest;
use App\Models\ExportDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExportDetailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('export_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exportDetails = ExportDetail::with(['media'])->get();

        return view('admin.exportDetails.index', compact('exportDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('export_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportDetails.create');
    }

    public function store(StoreExportDetailRequest $request)
    {
        $exportDetail = ExportDetail::create($request->all());

        if ($request->input('local_harvesters', false)) {
            $exportDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('local_harvesters'))))->toMediaCollection('local_harvesters');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exportDetail->id]);
        }

        return redirect()->route('admin.export-details.index');
    }

    public function edit(ExportDetail $exportDetail)
    {
        abort_if(Gate::denies('export_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportDetails.edit', compact('exportDetail'));
    }

    public function update(UpdateExportDetailRequest $request, ExportDetail $exportDetail)
    {
        $exportDetail->update($request->all());

        if ($request->input('local_harvesters', false)) {
            if (! $exportDetail->local_harvesters || $request->input('local_harvesters') !== $exportDetail->local_harvesters->file_name) {
                if ($exportDetail->local_harvesters) {
                    $exportDetail->local_harvesters->delete();
                }
                $exportDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('local_harvesters'))))->toMediaCollection('local_harvesters');
            }
        } elseif ($exportDetail->local_harvesters) {
            $exportDetail->local_harvesters->delete();
        }

        return redirect()->route('admin.export-details.index');
    }

    public function show(ExportDetail $exportDetail)
    {
        abort_if(Gate::denies('export_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportDetails.show', compact('exportDetail'));
    }

    public function destroy(ExportDetail $exportDetail)
    {
        abort_if(Gate::denies('export_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exportDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyExportDetailRequest $request)
    {
        $exportDetails = ExportDetail::find(request('ids'));

        foreach ($exportDetails as $exportDetail) {
            $exportDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('export_detail_create') && Gate::denies('export_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ExportDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
