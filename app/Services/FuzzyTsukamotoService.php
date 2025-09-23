<?php

namespace App\Services;

class FuzzyTsukamotoService
{

//    private array $rules = [];
//
//    public function __construct()
//    {
//        // Define IF-THEN rules
//        $this->rules = [
//            // Thin
//            ['weight' => 'thin', 'height' => 'short', 'output' => 'normal'],
//            ['weight' => 'thin', 'height' => 'normal', 'output' => 'lack'],
//            ['weight' => 'thin', 'height' => 'tall', 'output' => 'lack'],
//
//            // Normal
//            ['weight' => 'normal', 'height' => 'short', 'output' => 'lack'],
//            ['weight' => 'normal', 'height' => 'normal', 'output' => 'normal'],
//            ['weight' => 'normal', 'height' => 'tall', 'output' => 'normal'],
//
//            // Fat
//            ['weight' => 'fat', 'height' => 'short', 'output' => 'normal'],
//            ['weight' => 'fat', 'height' => 'normal', 'output' => 'normal'],
//            ['weight' => 'fat', 'height' => 'tall', 'output' => 'normal'],
//        ];
//
//    }
//
//    private function triangle($x, $a, $b, $c): float|int
//    {
//        if ($x <= $a || $x >= $c) return 0;
//        elseif ($x == $b) return 1;
//        elseif ($x > $a && $x < $b) return ($x - $a) / ($b - $a);
//        else return ($c - $x) / ($c - $b);
//    }
//
//    /*
//     * KURVA BAHU SEGITIGA
//     *
//     * Fuzzy Tsukamoto
//     * - fuzzyfikasi
//     * - inference fuzzy
//     * - defuzyfikasi
//     *
//     * Derajat keanggotaan Berat badan
//     * [Kurang,             Normal,         gemuk]
//     * [[0; 6; 12],      [6; 12; 18],       [12; 18; 24]]
//     *
//     * Kurang
//     * 1. ( 0 ; x <= 0 OR x >= 12)
//     * 2. ( X - 0 / 6 - 0  ; 0 < X < 6 )
//     * 3. (1 ; X == B)
//     * 4. (12 - X / 12 - 6 ; B < X < C )
//     *
//     * Derajat keanggotaan Tinggi Badan
//     * [Pendek,         Normal,         Tinggi]
//     * [[0; 45; 70],    [45;70;95],     [70; 95; 123]  ]
//     *
//     */
//
//
//    /*
//     * function getFuzzyBodyWeight
//     *
//     * menghitung derajat keanggotaan berat badan
//     * dengan parameter berat badan int
//     *
//     * return array "underweight" => int, "normal" => int, "overweight" => int,
//     */
//    private function membershipWeight($x): array
//    {
//        // Triangular sets: underweight (0, 6, 12), normal (6, 12, 18), overweight (12, 18 24)
//        return [
//            'thin' => $this->triangle($x, 0, 6, 12),
//            'normal' => $this->triangle($x, 6, 12, 18),
//            'fat' => $this->triangle($x, 12, 18, 24),
//        ];
//    }
//
//    private function membershipHeight($x): array
//    {
//        return [
//            'short' => $this->triangle($x, 0, 45, 70),   // segitiga kiri
//            'normal' => $this->triangle($x, 45, 70, 95), // segitiga penuh
//            'tall' => $this->triangle($x, 70, 95, 123), // segitiga kanan
//        ];
//    }
//
//    // Inference process
//    public function inference($weight, $height): array
//    {
//        $uWeight = $this->membershipWeight($weight);
//        $uHeight = $this->membershipHeight($height);
//
//        $results = [];
//        foreach ($this->rules as $rule) {
//            $alpha = min($uWeight[$rule['weight']], $uHeight[$rule['height']]);
//            $results[] = [
//                'alpha' => $alpha,
//                'z' => $this->consequent($rule['output'], $alpha)
//            ];
//        }
//
//        $crisp = $this->defuzzification($results);
//        $label = $this->translateResult($crisp);
//
//        return ['value' => $crisp, 'label' => $label];
//    }
//
//    // Consequent values (output mapping)
//    private function consequent($output, $alpha): float|int
//    {
//        $zValues = [
//            'poor' => 20,
//            'lack' => 40,
//            'normal' => 60,
//            'over' => 80,
//            'obese' => 100,
//        ];
//        return $zValues[$output] * $alpha;
//    }
//
//    // Defuzzification (weighted average)
//    private function defuzzification($results): float|int
//    {
//        $num = 0; // pembilang
//        $den = 0; // penyebut
//        foreach ($results as $res) {
//            $num += $res['alpha'] * $res['z'];
//            $den += $res['alpha'];
//        }
//        return $den == 0 ? 0 : $num / $den;
//    }
//
//    private function translateResult($value): string
//    {
//        if ($value < 30) {
//            return 'poor';
//        } elseif ($value > 30 && $value <= 45) {
//            return 'lack';
//        } elseif ($value > 45 && $value <= 65) {
//            return 'normal';
//        } elseif ($value > 65 && $value <= 85) {
//            return 'over';
//        } else {
//            return 'obese';
//        }
//    }

    private array $rules = [];

    public function __construct()
    {
        $this->rules = [
            // Severe malnutrition
            ['waz' => 'severely_underweight', 'haz' => 'severely_stunted', 'output' => 'poor'],
            ['waz' => 'underweight', 'haz' => 'stunted', 'output' => 'lack'],

            // Normal
            ['waz' => 'normal', 'haz' => 'stunted', 'output' => 'lack'],
            ['waz' => 'normal', 'haz' => 'normal', 'output' => 'normal'],
            ['waz' => 'normal', 'haz' => 'tall', 'output' => 'normal'],

            // Overweight/Obese
            ['waz' => 'overweight', 'haz' => 'normal', 'output' => 'over'],
            ['waz' => 'overweight', 'haz' => 'tall', 'output' => 'obese'],
        ];
    }

    // Triangular fuzzy membership
    private function triangle($x, $a, $b, $c): float|int
    {
        if ($x <= $a || $x >= $c) return 0;
        elseif ($x == $b) return 1;
        elseif ($x > $a && $x < $b) return ($x - $a) / ($b - $a);
        else return ($c - $x) / ($c - $b);
    }

    /*
     * Membership function WAZ (Weight-for-Age Z-score)
     * Categories: severely_underweight, underweight, normal, overweight
     */
    private function membershipWAZ($z): array
    {
        return [
            'severely_underweight' => $this->triangle($z, -5, -3, -2),
            'underweight' => $this->triangle($z, -3, -2, 0),
            'normal' => $this->triangle($z, -2, 0, +2),
            'overweight' => $this->triangle($z, 0, +2, +4),
        ];
    }

    /*
     * Membership function HAZ (Height-for-Age Z-score)
     * Categories: severely_stunted, stunted, normal, tall
     */
    private function membershipHAZ($z): array
    {
        return [
            'severely_stunted' => $this->triangle($z, -5, -3, -2),
            'stunted' => $this->triangle($z, -3, -2, 0),
            'normal' => $this->triangle($z, -2, 0, +2),
            'tall' => $this->triangle($z, 0, +2, +4),
        ];
    }

    // Inference process
    public function inference($waz, $haz): array
    {
        $uWAZ = $this->membershipWAZ($waz);
        $uHAZ = $this->membershipHAZ($haz);

        $results = [];
        foreach ($this->rules as $rule) {
            $alpha = min($uWAZ[$rule['waz']], $uHAZ[$rule['haz']]);
            $results[] = [
                'alpha' => $alpha,
                'z' => $this->consequent($rule['output'], $alpha)
            ];
        }

        $crisp = $this->defuzzification($results);
        $label = $this->translateResult($crisp);

        return ['value' => $crisp, 'label' => $label];
    }

    // Consequent values
    private function consequent($output, $alpha): float|int
    {
        $zValues = [
            'poor' => 20,
            'lack' => 40,
            'normal' => 60,
            'over' => 80,
            'obese' => 100,
        ];
        return $zValues[$output] * $alpha;
    }

    // Defuzzification (weighted average)
    private function defuzzification($results): float|int
    {
        $num = 0;
        $den = 0;
        foreach ($results as $res) {
            $num += $res['alpha'] * $res['z'];
            $den += $res['alpha'];
        }
        return $den == 0 ? 0 : $num / $den;
    }

    private function translateResult($value): string
    {
        if ($value < 30) {
            return 'severely_stunting';
        } elseif ($value > 30 && $value <= 45) {
            return 'stunting';
        } elseif ($value > 45 && $value <= 65) {
            return 'normal';
        } elseif ($value > 65 && $value <= 85) {
            return 'overweight';
        } else {
            return 'obesitas';
        }
    }

}
