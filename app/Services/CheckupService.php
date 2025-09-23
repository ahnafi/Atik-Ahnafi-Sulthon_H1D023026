<?php

namespace App\Services;

use App\Data\LhfaFiveYears;
use App\Data\WfaFiveYears;
use App\Models\Checkup;
use App\Models\Children;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CheckupService
{

    private function calculateWHOZScore($x, $ageInMonths, $gender, $type): float|int
    {
        if ($type === 'wfa') {
            $data = ($gender === 'L') ? WfaFiveYears::$WFABOYS : WfaFiveYears::$WFAGIRLS;
        } else {
            $data = ($gender === 'L') ? LhfaFiveYears::$LHFABOYS : LhfaFiveYears::$LHFAGIRLS;
        }

        $row = $data[$ageInMonths];

        // Cutoffs standar WHO
        $cutoffs = ['SD3neg', 'SD2neg', 'SD1neg', 'median', 'SD1', 'SD2', 'SD3'];
        $zs = [-3, -2, -1, 0, 1, 2, 3];

        for ($i = 0; $i < count($cutoffs) - 1; $i++) {
            $low = $row[$cutoffs[$i]];
            $high = $row[$cutoffs[$i + 1]];

            if ($x >= $low && $x <= $high) {
                // interpolasi linear
                $z = $zs[$i] + ($x - $low) * ($zs[$i + 1] - $zs[$i]) / ($high - $low);
                return $z;
            }
        }

        // Di luar range → extrapolate
        if ($x < $row['SD3neg']) {
            return -3 + ($x - $row['SD3neg']) / ($row['SD2neg'] - $row['SD3neg']);
        }
        if ($x > $row['SD3']) {
            return 3 + ($x - $row['SD3']) / ($row['SD3'] - $row['SD2']);
        }

        return 0;
    }


    /**
     * @throws \Exception
     */
    public function checkup(array $data): array
    {
        $children = Children::findOrFail($data['children_id']);
        // Hitung umur dalam bulan
        $data["age_in_months"] = Carbon::parse($children->date_of_birth)->diffInMonths(Carbon::parse($data["checkup_date"]));

        // Hitung Z-score
        $waz = $this->calculateWHOZScore($data["weight"], $data["age_in_months"], $children->gender, 'wfa');
        $haz = $this->calculateWHOZScore($data["height"], $data["age_in_months"], $children->gender, 'lhfa');

        // Jalankan fuzzy
        $service = App(FuzzyTsukamotoService::class);
        $result = $service->inference($waz, $haz);

        $data["fuzzy_score"] = $result['value'];
        $data["nutritional_status"] = $result['label'];

        Log::info("value = " . $result["value"]);
        Log::info("label = " . $result["label"]);

        return $data;
    }
}
