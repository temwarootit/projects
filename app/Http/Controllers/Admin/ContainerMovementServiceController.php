<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContainerMovementServiceRequest;
use App\Http\Requests\StoreContainerMovementServiceRequest;
use App\Http\Requests\UpdateContainerMovementServiceRequest;
use App\Models\ContainerMovementService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContainerMovementServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('container_movement_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $containerMovementServices = ContainerMovementService::all();

        return view('admin.containerMovementServices.index', compact('containerMovementServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('container_movement_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.containerMovementServices.create');
    }

    public function store(StoreContainerMovementServiceRequest $request)
    {
        $containerMovementService = ContainerMovementService::create($request->all());

        return redirect()->route('admin.container-movement-services.index');
    }

    public function edit(ContainerMovementService $containerMovementService)
    {
        abort_if(Gate::denies('container_movement_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.containerMovementServices.edit', compact('containerMovementService'));
    }

    public function update(UpdateContainerMovementServiceRequest $request, ContainerMovementService $containerMovementService)
    {
        $containerMovementService->update($request->all());

        return redirect()->route('admin.container-movement-services.index');
    }

    public function show(ContainerMovementService $containerMovementService)
    {
        abort_if(Gate::denies('container_movement_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.containerMovementServices.show', compact('containerMovementService'));
    }

    public function destroy(ContainerMovementService $containerMovementService)
    {
        abort_if(Gate::denies('container_movement_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $containerMovementService->delete();

        return back();
    }

    public function massDestroy(MassDestroyContainerMovementServiceRequest $request)
    {
        $containerMovementServices = ContainerMovementService::find(request('ids'));

        foreach ($containerMovementServices as $containerMovementService) {
            $containerMovementService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
