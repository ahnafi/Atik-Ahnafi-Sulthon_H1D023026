<?php

namespace App\Services;

class FuzzyTsukamotoService
{

    private array $rules = [];

    public function __construct()
    {
        // Define IF-THEN rules
        $this->rules = [
            // Very Thin
            ['weight' => 'very_thin', 'height' => 'very_short', 'output' => 'poor'],
            ['weight' => 'very_thin', 'height' => 'short', 'output' => 'lack'],
            ['weight' => 'very_thin', 'height' => 'normal', 'output' => 'lack'],
            ['weight' => 'very_thin', 'height' => 'tall', 'output' => 'normal'],

            // Thin
            ['weight' => 'thin', 'height' => 'very_short', 'output' => 'lack'],
            ['weight' => 'thin', 'height' => 'short', 'output' => 'normal'],
            ['weight' => 'thin', 'height' => 'normal', 'output' => 'lack'],
            ['weight' => 'thin', 'height' => 'tall', 'output' => 'lack'],

            // Normal
            ['weight' => 'normal', 'height' => 'very_short', 'output' => 'lack'],
            ['weight' => 'normal', 'height' => 'short', 'output' => 'lack'],
            ['weight' => 'normal', 'height' => 'normal', 'output' => 'normal'],
            ['weight' => 'normal', 'height' => 'tall', 'output' => 'normal'],

            // Fat
            ['weight' => 'fat', 'height' => 'very_short', 'output' => 'normal'],
            ['weight' => 'fat', 'height' => 'short', 'output' => 'normal'],
            ['weight' => 'fat', 'height' => 'normal', 'output' => 'normal'],
            ['weight' => 'fat', 'height' => 'tall', 'output' => 'normal'],
        ];

    }

    private function triangle($x, $a, $b, $c): float|int
    {
        if ($x <= $a || $x >= $c) return 0;
        elseif ($x == $b) return 1;
        elseif ($x > $a && $x < $b) return ($x - $a) / ($b - $a);
        else return ($c - $x) / ($c - $b);
    }

    /*
     * KURVA BAHU SEGITIGA
     *
     * Fuzzy Tsukamoto
     * - fuzzyfikasi
     * - inference fuzzy
     * - defuzyfikasi
     *
     * Derajat keanggotaan Berat badan
     * [Kurang,             Normal,         gemuk]
     * [[0; 6; 12],      [6; 12; 18],       [12; 18; 24]]
     *
     * Kurang
     * 1. ( 0 ; x <= 0 OR x >= 12)
     * 2. ( X - 0 / 6 - 0  ; 0 < X < 6 )
     * 3. (1 ; X == B)
     * 4. (12 - X / 12 - 6 ; B < X < C )
     *
     * Derajat keanggotaan Tinggi Badan
     * [Pendek,         Normal,         Tinggi]
     * [[0; 45; 70],    [45;70;95],     [70; 95; 123]  ]
     *
     */


    /*
     * function getFuzzyBodyWeight
     *
     * menghitung derajat keanggotaan berat badan
     * dengan parameter berat badan int
     *
     * return array "underweight" => int, "normal" => int, "overweight" => int,
     */
    private function membershipWeight($x): array
    {
        // Triangular sets: underweight (0, 6, 12), normal (6, 12, 18), overweight (12, 18 24)
        return [
            'thin' => $this->triangle($x, 0, 6, 12),
            'normal' => $this->triangle($x, 6, 12, 18),
            'fat' => $this->triangle($x, 12, 18, 24),
        ];
    }

    private function membershipHeight($x): array
    {
        return [
            'short' => $this->triangle($x, 0, 45, 70),   // segitiga kiri
            'normal' => $this->triangle($x, 45, 70, 95), // segitiga penuh
            'tall' => $this->triangle($x, 70, 95, 123), // segitiga kanan
        ];
    }

    // Inference process
    public function inference($weight, $height): array
    {
        $uWeight = $this->membershipWeight($weight);
        $uHeight = $this->membershipHeight($height);

        $results = [];
        foreach ($this->rules as $rule) {
            $alpha = min($uWeight[$rule['weight']], $uHeight[$rule['height']]);
            $results[] = [
                'alpha' => $alpha,
                'z' => $this->consequent($rule['output'], $alpha)
            ];
        }

        $crisp = $this->defuzzification($results);
        $label = $this->translateResult($crisp);

        return ['value' => $crisp, 'label' => $label];
    }

    // Consequent values (output mapping)
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
        $num = 0; // pembilang
        $den = 0; // penyebut
        foreach ($results as $res) {
            $num += $res['alpha'] * $res['z'];
            $den += $res['alpha'];
        }
        return $den == 0 ? 0 : $num / $den;
    }

    private function translateResult($value): string
    {
        if ($value < 30) {
            return 'poor';
        } elseif ($value > 30 && $value <= 45) {
            return 'lack';
        } elseif ($value > 45 && $value <= 65) {
            return 'normal';
        } elseif ($value > 65 && $value <= 85) {
            return 'over';
        } else {
            return 'obese';
        }
    }

}
