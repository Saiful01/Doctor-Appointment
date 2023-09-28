<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\Admin\StatusResource;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Status;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class StatusApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusResource(Status::all());
    }

    public function store(StoreStatusRequest $request)
    {
        $status = Status::create($request->all());

        return (new StatusResource($status))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    public function statusUpdate(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'appointment_id' => 'required',
                    'status_id' => 'required'
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 400);
            }



            $applicant = AppointmentStatus::create($request->all());

            Appointment::where('id', $request['appointment_id'])->update([
                'status_id' => $request['status_id']
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Status Successfully Updated',
                'data' => $applicant,
            ], 200);

        } catch (\Exception $exception) {

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function show(Status $status)
    {
        //abort_if(Gate::denies('status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusResource($status);
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->all());

        return (new StatusResource($status))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Status $status)
    {
        //abort_if(Gate::denies('status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $status->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
