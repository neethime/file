<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function upload(FileRequest $request)
    {
        $token = $request->token;
        if ($token != env('FILE_TOKEN'))
            return response()->json(['msg' => 'token错误'], 412);
        try {
            $file = $request->file;
            $projectId = $request->project_id;
            $field = $request->field;
            $folderName = "$projectId/$field";
            $fileName = $file->getClientOriginalName();
            Storage::disk('projectUploads')->putFileAs($folderName, $file, $fileName);
            return response()->json(['code' => 1, 'path' => "$folderName/$fileName"]);
        } catch (\Exception $exception) {
            return response()->json(['code' => 0, 'msg' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function download(FileRequest $request)
    {
        $token = $request->token;
        if ($token != env('FILE_TOKEN'))
            return response()->json(['msg' => 'token错误'], 412);
        try {
            $path = $request->file_path;
            return Storage::disk('projectUploads')->download($path);
        } catch (\Exception $exception) {
            return response()->json(['code' => 0, 'msg' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function upload2(FileRequest $request)
    {
        $token = $request->token;
        if ($token != env('FILE_TOKEN'))
            return response()->json(['msg' => 'token错误'], 412);
        try {
            $file = $request->file;
            $modelId = $request->id;
            $field = $request->field;
            $folderName = "$modelId/$field";
            $fileName = $file->getClientOriginalName();
            Storage::disk('standardizedUploads')->putFileAs($folderName, $file, $fileName);
            return response()->json(['code' => 1, 'path' => "$folderName/$fileName"]);
        } catch (\Exception $exception) {
            return response()->json(['code' => 0, 'msg' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function download2(FileRequest $request)
    {
        $token = $request->token;
        if ($token != env('FILE_TOKEN'))
            return response()->json(['msg' => 'token错误'], 412);
        try {
            $path = $request->file_path;
            return Storage::disk('standardizedUploads')->download($path);
        } catch (\Exception $exception) {
            return response()->json(['code' => 0, 'msg' => $exception->getMessage()], $exception->getCode());
        }
    }
}
