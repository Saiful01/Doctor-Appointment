<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
use App\Http\Resources\Admin\PlatformResource;
use App\Models\Platform;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlatformApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('platform_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlatformResource(Platform::first());
    }

    public function store(StorePlatformRequest $request)
    {
        $platform = Platform::create($request->all());

        if ($request->input('logo', false)) {
            $platform->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new PlatformResource($platform))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Platform $platform)
    {
        //abort_if(Gate::denies('platform_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlatformResource($platform);
    }

    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        $platform->update($request->all());

        if ($request->input('logo', false)) {
            if (! $platform->logo || $request->input('logo') !== $platform->logo->file_name) {
                if ($platform->logo) {
                    $platform->logo->delete();
                }
                $platform->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($platform->logo) {
            $platform->logo->delete();
        }

        return (new PlatformResource($platform))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Platform $platform)
    {
        //abort_if(Gate::denies('platform_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $platform->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
