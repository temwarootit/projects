<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComplianceInformationRequest;
use App\Http\Requests\StoreComplianceInformationRequest;
use App\Http\Requests\UpdateComplianceInformationRequest;
use App\Models\ComplianceInformation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComplianceInformationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('compliance_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complianceInformations = ComplianceInformation::all();

        return view('admin.complianceInformations.index', compact('complianceInformations'));
    }

    public function create()
    {
        abort_if(Gate::denies('compliance_information_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complianceInformations.create');
    }

    public function store(StoreComplianceInformationRequest $request)
    {
        $complianceInformation = ComplianceInformation::create($request->all());

        return redirect()->route('admin.compliance-informations.index');
    }

    public function edit(ComplianceInformation $complianceInformation)
    {
        abort_if(Gate::denies('compliance_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complianceInformations.edit', compact('complianceInformation'));
    }

    public function update(UpdateComplianceInformationRequest $request, ComplianceInformation $complianceInformation)
    {
        $complianceInformation->update($request->all());

        return redirect()->route('admin.compliance-informations.index');
    }

    public function show(ComplianceInformation $complianceInformation)
    {
        abort_if(Gate::denies('compliance_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complianceInformations.show', compact('complianceInformation'));
    }

    public function destroy(ComplianceInformation $complianceInformation)
    {
        abort_if(Gate::denies('compliance_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complianceInformation->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplianceInformationRequest $request)
    {
        $complianceInformations = ComplianceInformation::find(request('ids'));

        foreach ($complianceInformations as $complianceInformation) {
            $complianceInformation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
