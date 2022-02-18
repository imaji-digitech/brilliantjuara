<?php

namespace App\Http\Controllers;

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
            return Redirect::back()->withErrors(['msg' => 'Format excel anda salah']);
        }

    }
    public function uploadQuestStatic2(Request $request)
    {
        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $this->checkUploadedFileProperties($extension, $fileSize);
            $location = 'uploads';
            $file->move($location, $filename);
            $filepath = public_path($location . "/" . $filename);
            $file = fopen($filepath, "r");
            $importData_arr = array();
            $i = 0;
            while (($filedata = fgetcsv($file, 180, ",")) !== FALSE) {
                $num = count($filedata);
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
//                dd($importData);
                $quest = $importData[1]; //Get user names
//                $a = $importData[2];
//                $b = $importData[3];
//                $c = $importData[4];
//                $d = $importData[5];
//                $e = $importData[6];
                $key = $importData[7];
                $discussion = $importData[8];
                $j++;
                try {
                    DB::beginTransaction();
                    $quest = ExamQuest::create([
                        'equation' => '',
                        'question' => $quest,
                        'answer' => $key,
                        'discussion' => $discussion,
                    ]);
                    for ($i = 1; $i <= 5; $i++) {
                        ExamQuestChoice::create([
                            'exam_quest_id' => $quest->id,
                            'answer' => $importData[$i+1],
                            'equation' => '',
                            'score' => 0,
                            'choice' => $i,
                        ]);
                    }
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                }
            }
            return response()->json([
                'message' => "$j records successfully uploaded"
            ]);
        } else {
            throw new Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
//        return redirect()->back();
    }

    public function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            } else {
                throw new Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        } else {
            throw new Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }


}
