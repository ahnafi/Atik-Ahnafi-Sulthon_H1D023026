<?php

namespace App\Services;

class FuzzyTsukamotoService
{

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
     * return array "underweight" => int, "normal" => int, "heavy" => int,
     */
    private function getFuzzyBodyWeight(int $w): array
    {

        $underweight = [0, 6, 12];
        $normal = [6, 12, 18];
        $heavy = [12, 18, 24];

        $result = [0, 0, 0];

        // underweight
        if ($w == $underweight[1]) {
            $result[0] = 1;
        } else if ($w > $underweight[0] && $w < $underweight[1]) {
            $result[0] = ($w - $underweight[0]) / ($underweight[1] - $underweight[0]);
        } else if ($underweight[1] < $w && $w < $underweight[2]) {
            $result[0] = ($underweight[2] - $w) / ($underweight[2] - $underweight[1]);
        } else {
            $result[0] = 0;
        }

        // normal
        if ($w == $normal[1]) {
            $result[1] = 1;
        } else if ($w > $normal[0] && $w < $normal[1]) {
            $result[1] = ($w - $normal[0]) / ($normal[1] - $normal[0]);
        } else if ($normal[1] < $w && $w < $normal[2]) {
            $result[1] = ($normal[2] - $w) / ($normal[2] - $normal[1]);
        } else {
            $result[1] = 0;
        }

        // heavy
        if ($w == $heavy[1]) {
            $result[2] = 1;
        } else if ($w > $heavy[0] && $w < $heavy[1]) {
            $result[2] = ($w - $heavy[0]) / ($heavy[1] - $heavy[0]);
        } else if ($heavy[1] < $w && $w < $heavy[2]) {
            $result[2] = ($heavy[2] - $w) / ($heavy[2] - $heavy[1]);
        } else {
            $result[2] = 0;
        }

        return [
            "underweight" => $result[0],
            "normal" => $result[1],
            "heavy" => $result[2],
        ];

    }

    /*
     *
     *
     *
     */
    private function getFuzzyBodyHeight(int $h): array
    {

        $short = [0, 45, 70];
        $normal = [45, 70, 95];
        $tall = [70, 95, 123];

        $result = [0, 0, 0];

        // short
        if ($h == $short[1]) {
            $result[0] = 1;
        } else if ($h >= $short[0] && $h <= $short[1]) {
            $result[0] = ($h - $short[0]) / ($short[1] - $short[0]);
        } else if ($short[1] <= $h && $h <= $short[2]) {
            $result[0] = ($short[2] - $h) / ($short[2] - $short[1]);
        } else {
            $result[0] = 0;
        }

        // normal
        if ($h == $normal[1]) {
            $result[1] = 1;
        } else if ($h >= $normal[0] && $h <= $normal[1]) {
            $result[1] = ($h - $normal[0]) / ($normal[1] - $normal[0]);
        } else if ($normal[1] <= $h && $h <= $normal[2]) {
            $result[1] = ($normal[2] - $h) / ($normal[2] - $normal[1]);
        } else {
            $result[1] = 0;
        }

        // tall
        if ($h == $tall[1]) {
            $result[2] = 1;
        } else if ($h >= $tall[0] && $h <= $tall[1]) {
            $result[2] = ($h - $tall[0]) / ($tall[1] - $tall[0]);
        } else if ($tall[1] <= $h && $h <= $tall[2]) {
            $result[2] = ($tall[2] - $h) / ($tall[2] - $tall[1]);
        } else {
            $result[2] = 0;
        }

        return [
            "short" => $result[0],
            "normal" => $result[1],
            "tall" => $result[2],
        ];

    }

    /*
     *
     *
     */

    public function calculateNutritionalStatus(int $w, int $h): array
    {

        $bodyWeight = $this->getFuzzyBodyWeight($w);
        $bodyHeight = $this->getFuzzyBodyHeight($h);
        //
        $severelyStunting = 20;
        $stunting = 40;
        $normal = 60;
        $overweight = 80;
        $obesitas = 100;

        /*
         *  Inference fuzzy
         *
         * status z
         * "severely_stunting" ,"stunting", "normal", "overweight", "obesitas"
         * 20, 40, 60, 80 ,100
         *
         * rules
         *
        */
        $rules = [
            ["weight" => "underweight", "height" => "short", "result" => $severelyStunting],
            ["weight" => "underweight", "height" => "normal", "result" => $stunting],
            ["weight" => "underweight", "height" => "tall", "result" => $normal],
            ["weight" => "normal", "height" => "short", "result" => $stunting],
            ["weight" => "normal", "height" => "normal", "result" => $normal],
            ["weight" => "normal", "height" => "tall", "result" => $normal],
            ["weight" => "heavy", "height" => "short", "result" => $overweight],
            ["weight" => "heavy", "height" => "normal", "result" => $overweight],
            ["weight" => "heavy", "height" => "tall", "result" => $obesitas],
        ];

        $resultRule = [];

        foreach ($rules as $rule) {
            $weightValue = $bodyWeight[$rule["weight"]];
            $heightValue = $bodyHeight[$rule["height"]];

            // Cari nilai alpha-predikat menggunakan MIN
            $alpha = min($weightValue, $heightValue);
            if ($alpha > 0) {
                $resultRule[] = [
                    "alpha" => $alpha,
                    "z" => $rule["result"], // hasil nilai z
                ];
            }
        }

        $numerator = 0;
        $denominator = 0;

        foreach ($resultRule as $rule) {
            $numerator += $rule["z"] * $rule["alpha"];
            $denominator += $rule["alpha"];
        }

        // Hindari pembagian dengan nol
        if ($denominator == 0) return ['score' => 0, 'status' => 'Tidak Terdefinisi'];

        $result = $numerator / $denominator;

        // Tentukan status berdasarkan score
        if ($result <= 20) {
            $status = "severely_stunting";
        } elseif ($result <= 40) {
            $status = "stunting";
        } elseif ($result <= 60) {
            $status = "normal";
        } elseif ($result <= 80) {
            $status = "overweight";
        } else {
            $status = "obesitas";
        }

        return ["score" => $result, "status" => $status];

    }

}
