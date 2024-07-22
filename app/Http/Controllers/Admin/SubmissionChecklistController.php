<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubmissionChecklistRequest;
use App\Http\Requests\StoreSubmissionChecklistRequest;
use App\Http\Requests\UpdateSubmissionChecklistRequest;
use App\Models\SubmissionChecklist;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubmissionChecklistController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('submission_checklist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submissionChecklists = SubmissionChecklist::with(['media'])->get();

        return view('admin.submissionChecklists.index', compact('submissionChecklists'));
    }

    public function create()
    {
        abort_if(Gate::denies('submission_checklist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.submissionChecklists.create');
    }

    public function store(StoreSubmissionChecklistRequest $request)
    {
        $submissionChecklist = SubmissionChecklist::create($request->all());

        foreach ($request->input('applicant_identification_card_passport_copy', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applicant_identification_card_passport_copy');
        }

        foreach ($request->input('police_clearance', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('police_clearance');
        }

        foreach ($request->input('business_registration_certificate', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('business_registration_certificate');
        }

        foreach ($request->input('foreign_investment_license_certificate', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('foreign_investment_license_certificate');
        }

        foreach ($request->input('business_local_license_certificate', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('business_local_license_certificate');
        }

        foreach ($request->input('financial_background', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('financial_background');
        }

        foreach ($request->input('list_of_fishers_suppliers', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('list_of_fishers_suppliers');
        }

        if ($request->input('listfishers', false)) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($request->input('listfishers'))))->toMediaCollection('listfishers');
        }

        foreach ($request->input('photo', []) as $file) {
            $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $submissionChecklist->id]);
        }

        return redirect()->route('admin.submission-checklists.index');
    }

    public function edit(SubmissionChecklist $submissionChecklist)
    {
        abort_if(Gate::denies('submission_checklist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.submissionChecklists.edit', compact('submissionChecklist'));
    }

    public function update(UpdateSubmissionChecklistRequest $request, SubmissionChecklist $submissionChecklist)
    {
        $submissionChecklist->update($request->all());

        if (count($submissionChecklist->applicant_identification_card_passport_copy) > 0) {
            foreach ($submissionChecklist->applicant_identification_card_passport_copy as $media) {
                if (! in_array($media->file_name, $request->input('applicant_identification_card_passport_copy', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->applicant_identification_card_passport_copy->pluck('file_name')->toArray();
        foreach ($request->input('applicant_identification_card_passport_copy', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applicant_identification_card_passport_copy');
            }
        }

        if (count($submissionChecklist->police_clearance) > 0) {
            foreach ($submissionChecklist->police_clearance as $media) {
                if (! in_array($media->file_name, $request->input('police_clearance', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->police_clearance->pluck('file_name')->toArray();
        foreach ($request->input('police_clearance', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('police_clearance');
            }
        }

        if (count($submissionChecklist->business_registration_certificate) > 0) {
            foreach ($submissionChecklist->business_registration_certificate as $media) {
                if (! in_array($media->file_name, $request->input('business_registration_certificate', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->business_registration_certificate->pluck('file_name')->toArray();
        foreach ($request->input('business_registration_certificate', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('business_registration_certificate');
            }
        }

        if (count($submissionChecklist->foreign_investment_license_certificate) > 0) {
            foreach ($submissionChecklist->foreign_investment_license_certificate as $media) {
                if (! in_array($media->file_name, $request->input('foreign_investment_license_certificate', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->foreign_investment_license_certificate->pluck('file_name')->toArray();
        foreach ($request->input('foreign_investment_license_certificate', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('foreign_investment_license_certificate');
            }
        }

        if (count($submissionChecklist->business_local_license_certificate) > 0) {
            foreach ($submissionChecklist->business_local_license_certificate as $media) {
                if (! in_array($media->file_name, $request->input('business_local_license_certificate', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->business_local_license_certificate->pluck('file_name')->toArray();
        foreach ($request->input('business_local_license_certificate', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('business_local_license_certificate');
            }
        }

        if (count($submissionChecklist->financial_background) > 0) {
            foreach ($submissionChecklist->financial_background as $media) {
                if (! in_array($media->file_name, $request->input('financial_background', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->financial_background->pluck('file_name')->toArray();
        foreach ($request->input('financial_background', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('financial_background');
            }
        }

        if (count($submissionChecklist->list_of_fishers_suppliers) > 0) {
            foreach ($submissionChecklist->list_of_fishers_suppliers as $media) {
                if (! in_array($media->file_name, $request->input('list_of_fishers_suppliers', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->list_of_fishers_suppliers->pluck('file_name')->toArray();
        foreach ($request->input('list_of_fishers_suppliers', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('list_of_fishers_suppliers');
            }
        }

        if ($request->input('listfishers', false)) {
            if (! $submissionChecklist->listfishers || $request->input('listfishers') !== $submissionChecklist->listfishers->file_name) {
                if ($submissionChecklist->listfishers) {
                    $submissionChecklist->listfishers->delete();
                }
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($request->input('listfishers'))))->toMediaCollection('listfishers');
            }
        } elseif ($submissionChecklist->listfishers) {
            $submissionChecklist->listfishers->delete();
        }

        if (count($submissionChecklist->photo) > 0) {
            foreach ($submissionChecklist->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $submissionChecklist->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $submissionChecklist->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.submission-checklists.index');
    }

    public function show(SubmissionChecklist $submissionChecklist)
    {
        abort_if(Gate::denies('submission_checklist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.submissionChecklists.show', compact('submissionChecklist'));
    }

    public function destroy(SubmissionChecklist $submissionChecklist)
    {
        abort_if(Gate::denies('submission_checklist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submissionChecklist->delete();

        return back();
    }

    public function massDestroy(MassDestroySubmissionChecklistRequest $request)
    {
        $submissionChecklists = SubmissionChecklist::find(request('ids'));

        foreach ($submissionChecklists as $submissionChecklist) {
            $submissionChecklist->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('submission_checklist_create') && Gate::denies('submission_checklist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubmissionChecklist();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
