<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStaffTravelFormRequest;
use App\Http\Requests\StoreStaffTravelFormRequest;
use App\Http\Requests\UpdateStaffTravelFormRequest;
use App\Models\StaffTravelForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffTravelFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_travel_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffTravelForms = StaffTravelForm::all();

        return view('admin.staffTravelForms.index', compact('staffTravelForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('staff_travel_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffTravelForms.create');
    }

    public function store(StoreStaffTravelFormRequest $request)
    {
        $staffTravelForm = StaffTravelForm::create($request->all());

        return redirect()->route('admin.staff-travel-forms.index');
    }

    public function edit(StaffTravelForm $staffTravelForm)
    {
        abort_if(Gate::denies('staff_travel_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffTravelForms.edit', compact('staffTravelForm'));
    }

    public function update(UpdateStaffTravelFormRequest $request, StaffTravelForm $staffTravelForm)
    {
        $staffTravelForm->update($request->all());

        return redirect()->route('admin.staff-travel-forms.index');
    }

    public function show(StaffTravelForm $staffTravelForm)
    {
        abort_if(Gate::denies('staff_travel_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffTravelForms.show', compact('staffTravelForm'));
    }

    public function destroy(StaffTravelForm $staffTravelForm)
    {
        abort_if(Gate::denies('staff_travel_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffTravelForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaffTravelFormRequest $request)
    {
        $staffTravelForms = StaffTravelForm::find(request('ids'));

        foreach ($staffTravelForms as $staffTravelForm) {
            $staffTravelForm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
