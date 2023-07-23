<?php

namespace App\Http\Requests;

use App\Models\AppointmentReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppointmentReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('appointment_report_create');
    }

    public function rules()
    {
        return [
            'appointment_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'report' => [
                'array',
            ],
        ];
    }
}
