<?php

namespace App\Imports;

use App\Models\ExamQuest;
use App\Models\ExamQuestChoice;
use App\Models\ExportCache;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StaticImport implements ToCollection
{
    private $step;
    public function __construct($step)
    {
        $this->step=$step;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $step = $this->step;
        foreach ($collection as $index => $row) {
            if ($index == 0) {
                continue;
            }
            if ($row[0] == null) {
                continue;
            }
            $quest = ExamQuest::create([
                'exam_step_id' => $step,
                'equation' => '',
                'question' => $row[1],
                'answer' => $row[7],
                'discussion' => $row[8],
            ]);
//            dd($step);
            for ($i = 1; $i <= 5; $i++) {
                ExamQuestChoice::create([
                    'exam_quest_id' => $quest->id,
                    'answer' => $row[$i + 1],
                    'equation' => '',
                    'score' => 0,
                    'choice' => $i,
                ]);
            }
        }
    }
}
