<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest2 extends FormRequest
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

    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'file' => 'required',
                    'token' => 'required',
                    'field' => 'required',
                    'model_id' =>'required|uuid',
                ];
            }
            case 'GET':
            {
                return [
                    'token' => 'required',
                    'file_path' => 'required',
                ];
            }
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'file.required' => '文件不能为空',
            'token.required' => 'token不能为空',
            'field.required' => '存储类型不能为空',
            'file_path.required' => '存储路径不能为空',
            'model_id.required' => '实体ID不能为空',
            'model_id.uuid' => '实体ID格式不正确',
        ];
    }
}
