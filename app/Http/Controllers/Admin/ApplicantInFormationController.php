<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApplicantInFormationRequest;
use App\Http\Requests\StoreApplicantInFormationRequest;
use App\Http\Requests\UpdateApplicantInFormationRequest;
use App\Models\ApplicantInFormation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicantInFormationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('applicant_in_formation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicantInFormations = ApplicantInFormation::all();

        return view('admin.applicantInFormations.index', compact('applicantInFormations'));
    }

    public function create()
    {
        abort_if(Gate::denies('applicant_in_formation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicantInFormations.create');
    }

    public function store(StoreApplicantInFormationRequest $request)
    {
        $applicantInFormation = ApplicantInFormation::create($request->all());

        return redirect()->route('admin.applicant-in-formations.index');
    }

    public function edit(ApplicantInFormation $applicantInFormation)
    {
        abort_if(Gate::denies('applicant_in_formation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicantInFormations.edit', compact('applicantInFormation'));
    }

    public function update(UpdateApplicantInFormationRequest $request, ApplicantInFormation $applicantInFormation)
    {
        $applicantInFormation->update($request->all());

        return redirect()->route('admin.applicant-in-formations.index');
    }

    public function show(ApplicantInFormation $applicantInFormation)
    {
        abort_if(Gate::denies('applicant_in_formation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicantInFormations.show', compact('applicantInFormation'));
    }

    public function destroy(ApplicantInFormation $applicantInFormation)
    {
        abort_if(Gate::denies('applicant_in_formation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicantInFormation->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicantInFormationRequest $request)
    {
        $applicantInFormations = ApplicantInFormation::find(request('ids'));

        foreach ($applicantInFormations as $applicantInFormation) {
            $applicantInFormation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
