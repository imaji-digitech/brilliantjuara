<?php

namespace App\Http\Controllers;

use App\Imports\DynamicImport;
use App\Imports\StaticImport;
use App\Models\ExamQuest;
use App\Models\ExamQuestChoice;
use App\Models\ExportCache;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;


class UploadFile extends Controller
{

    public function uploadQuestStatic(Request $request,$step){
        try {
            Excel::import(new StaticImport($step), $request->file('uploaded_file'));
            return Redirect::back();
        }catch (Exception $e){
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function uploadQuestDynamic(Request $request,$step){
        try {
            Excel::import(new DynamicImport($step), $request->file('uploaded_file'));
            return Redirect::back();
        }catch (Exception $e){
            return Redirect::back()->withErrors(['msg' => 'Format excel anda salah']);
        }
    }

}
