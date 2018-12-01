<?php

namespace App\Http\Requests\HealthLogs;

use Illuminate\Foundation\Http\FormRequest;

class StoreHealthLog extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'log_date' => 'required',
            'log_time' => 'required',
            'sys' => 'required_if:bp,1',
            'dia' => 'required_if:bp,1',
            'h_rate' => 'required_if:hr,1',
            'weight' => 'required_if:wt,1',
            'lp_total' => 'required_if:lp,1',
            'lp_hdl' => 'required_if:lp,1',
            'lp_ldl' => 'required_if:lp,1',
            'lp_triglycerides' => 'required_if:lp,1',
            'creatinine_details' => 'required_if:creatinine,1',
            'cbc_details' => 'required_if:cbc,1',
            'others_details' => 'required_if:others,1',
            'comments_details' => 'required_if:comments,1',
        ];
    }



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
           'required_if' => 'The :attribute field is required when :other is checked.',
        ];
    } //End of message()

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
          "log_date" => "Date",
          "log_time" => "Time",
          "bp" => "Blood Pressure",
          "sys" => "Systolic",
          "dia" => "Diastolic",
          "hr" => "Heart Rate",
          "h_rate" => "Heart Rate Value",
          "wt" => "Weight",
          "weight" => "Weight Value",
          "lp" => "Lipid Profile",
          "lp_total" => "Cholesterol (Total)",
          "lp_hdl" => "HDL - Cholesterol",
          "lp_ldl" => "LDL - Cholesterol",
          "lp_triglycerides" => "Triglycerides",
          "bs" => "Blood Sugar",
          "bs_rbs" => "Random Blood Sugar (RBS)",
          "bs_fbs" => "Fasting Blood Sugar (FBS)",
          "bs_abf" => "Blood Sugar 2H ABF",
          "creatinine" => "Creatinine",
          "creatinine_details" => "Creatinine Value",
          "cbc" => "CBC",
          "cbc_details" => "CBC Details",
          "others" => "Others",
          "others_details" => "Other Details",
          "comments" => "Comments",
          "comments_details" => "Comments Value",
        ];
    } //End of attributes()
}
