<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompanyDetailRequest;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use App\Models\CompanyDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CompanyDetailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('company_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyDetails = CompanyDetail::with(['media'])->get();

        return view('admin.companyDetails.index', compact('companyDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyDetails.create');
    }

    public function store(StoreCompanyDetailRequest $request)
    {
        $companyDetail = CompanyDetail::create($request->all());

        if ($request->input('business_license', false)) {
            $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('business_license'))))->toMediaCollection('business_license');
        }

        if ($request->input('business_plan', false)) {
            $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('business_plan'))))->toMediaCollection('business_plan');
        }

        foreach ($request->input('details_of_fisher', []) as $file) {
            $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('details_of_fisher');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $companyDetail->id]);
        }

        return redirect()->route('admin.company-details.index');
    }

    public function edit(CompanyDetail $companyDetail)
    {
        abort_if(Gate::denies('company_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyDetails.edit', compact('companyDetail'));
    }

    public function update(UpdateCompanyDetailRequest $request, CompanyDetail $companyDetail)
    {
        $companyDetail->update($request->all());

        if ($request->input('business_license', false)) {
            if (! $companyDetail->business_license || $request->input('business_license') !== $companyDetail->business_license->file_name) {
                if ($companyDetail->business_license) {
                    $companyDetail->business_license->delete();
                }
                $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('business_license'))))->toMediaCollection('business_license');
            }
        } elseif ($companyDetail->business_license) {
            $companyDetail->business_license->delete();
        }

        if ($request->input('business_plan', false)) {
            if (! $companyDetail->business_plan || $request->input('business_plan') !== $companyDetail->business_plan->file_name) {
                if ($companyDetail->business_plan) {
                    $companyDetail->business_plan->delete();
                }
                $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('business_plan'))))->toMediaCollection('business_plan');
            }
        } elseif ($companyDetail->business_plan) {
            $companyDetail->business_plan->delete();
        }

        if (count($companyDetail->details_of_fisher) > 0) {
            foreach ($companyDetail->details_of_fisher as $media) {
                if (! in_array($media->file_name, $request->input('details_of_fisher', []))) {
                    $media->delete();
                }
            }
        }
        $media = $companyDetail->details_of_fisher->pluck('file_name')->toArray();
        foreach ($request->input('details_of_fisher', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $companyDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('details_of_fisher');
            }
        }

        return redirect()->route('admin.company-details.index');
    }

    public function show(CompanyDetail $companyDetail)
    {
        abort_if(Gate::denies('company_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyDetails.show', compact('companyDetail'));
    }

    public function destroy(CompanyDetail $companyDetail)
    {
        abort_if(Gate::denies('company_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyDetailRequest $request)
    {
        $companyDetails = CompanyDetail::find(request('ids'));

        foreach ($companyDetails as $companyDetail) {
            $companyDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('company_detail_create') && Gate::denies('company_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CompanyDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
