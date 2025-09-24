<?php

namespace App\Services;

class FuzzyTsukamotoService
{
    private array $rules = [];

    public function __construct()
    {
        $this->rules = [
            // 🔴 Severe Malnutrition
            ['waz'=>'severely_underweight', 'haz'=>'severely_stunted', 'output'=>'severely_stunting'],
            ['waz'=>'severely_underweight', 'haz'=>'stunted', 'output'=>'severely_stunting'],
            ['waz'=>'severely_underweight', 'haz'=>'normal', 'output'=>'stunting'],
            ['waz'=>'severely_underweight', 'haz'=>'tall', 'output'=>'stunting'],

            // 🟠 Underweight
            ['waz'=>'underweight', 'haz'=>'severely_stunted', 'output'=>'severely_stunting'],
            ['waz'=>'underweight', 'haz'=>'stunted', 'output'=>'stunting'],
            ['waz'=>'underweight', 'haz'=>'normal', 'output'=>'stunting'],
            ['waz'=>'underweight', 'haz'=>'tall', 'output'=>'normal'],

            // 🟢 Normal weight
            ['waz'=>'normal', 'haz'=>'severely_stunted', 'output'=>'stunting'],
            ['waz'=>'normal', 'haz'=>'stunted', 'output'=>'stunting'],
            ['waz'=>'normal', 'haz'=>'normal', 'output'=>'normal'],
            ['waz'=>'normal', 'haz'=>'tall', 'output'=>'normal'],

            // 🔵 Overweight
            ['waz'=>'overweight', 'haz'=>'severely_stunted', 'output'=>'overweight'], // short obese risk
            ['waz'=>'overweight', 'haz'=>'stunted', 'output'=>'overweight'],
            ['waz'=>'overweight', 'haz'=>'normal', 'output'=>'overweight'],
            ['waz'=>'overweight', 'haz'=>'tall', 'output'=>'obesitas'],
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
            if ($alpha > 0) {
                $results[] = [
                    'alpha' => $alpha,
                    'z' => $this->consequent($rule['output'], $alpha)
                ];
            }
        }

        $crisp = $this->defuzzification($results);
        $label = $this->translateResult($crisp);

        return ['value' => $crisp, 'label' => $label];
    }

    // Consequent values (selaras dengan translateResult)
    private function consequent($output, $alpha): float|int
    {
        $zValues = [
            'severely_stunting' => 20,
            'stunting' => 40,
            'normal' => 60,
            'overweight' => 80,
            'obesitas' => 100,
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
        //"normal", "stunting", "severely_stunting", "overweight", "obesitas"
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
