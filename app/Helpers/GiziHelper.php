<?php

namespace App\Helpers;

class GiziHelper
{
    public static function hitungStatusGizi($bb, $umur, $jk)
    {
        $umur = (int) $umur;
        $ref = self::getWHOReference($umur, $jk);
        if (!$ref || !isset($ref['median']) || !isset($ref['sd'])) {
            return 'Referensi tidak ditemukan';
        }

        $zscore = ($bb - $ref['median']) / $ref['sd'];

        return match (true) {
            $zscore > 2 => 'Gemuk',
            $zscore >= -2 => 'Normal',
            $zscore >= -3 => 'Gizi Kurang',
            default => 'Gizi Buruk',
        };
    }

    public static function getWHOReference($umur, $jk)
    {
        $data = [
            'L' => [
                0 => ['median' => 3.3, 'sd' => 0.5],
                1 => ['median' => 4.5, 'sd' => 0.6],
                2 => ['median' => 5.6, 'sd' => 0.7],
                3 => ['median' => 6.4, 'sd' => 0.8],
                4 => ['median' => 7.0, 'sd' => 0.8],
                5 => ['median' => 7.5, 'sd' => 0.8],
                6 => ['median' => 7.9, 'sd' => 0.9],
                7 => ['median' => 8.2, 'sd' => 0.9],
                8 => ['median' => 8.5, 'sd' => 0.9],
                9 => ['median' => 8.8, 'sd' => 0.9],
                10 => ['median' => 9.0, 'sd' => 1.0],
                11 => ['median' => 9.3, 'sd' => 1.0],
                12 => ['median' => 9.6, 'sd' => 1.0],
                13 => ['median' => 9.8, 'sd' => 1.0],
                14 => ['median' => 10.0, 'sd' => 1.0],
                15 => ['median' => 10.2, 'sd' => 1.0],
                16 => ['median' => 10.5, 'sd' => 1.0],
                17 => ['median' => 10.7, 'sd' => 1.0],
                18 => ['median' => 10.9, 'sd' => 1.1],
                19 => ['median' => 11.1, 'sd' => 1.1],
                20 => ['median' => 11.3, 'sd' => 1.1],
                21 => ['median' => 11.5, 'sd' => 1.1],
                22 => ['median' => 11.8, 'sd' => 1.1],
                23 => ['median' => 12.0, 'sd' => 1.1],
                24 => ['median' => 12.2, 'sd' => 1.1],
                25 => ['median' => 12.4, 'sd' => 1.1],
                26 => ['median' => 12.5, 'sd' => 1.1],
                27 => ['median' => 12.7, 'sd' => 1.1],
                28 => ['median' => 12.9, 'sd' => 1.1],
                29 => ['median' => 13.1, 'sd' => 1.1],
                30 => ['median' => 13.2, 'sd' => 1.1],
                31 => ['median' => 13.4, 'sd' => 1.2],
                32 => ['median' => 13.6, 'sd' => 1.2],
                33 => ['median' => 13.8, 'sd' => 1.2],
                34 => ['median' => 14.0, 'sd' => 1.2],
                35 => ['median' => 14.1, 'sd' => 1.2],
                36 => ['median' => 14.3, 'sd' => 1.2],
                37 => ['median' => 14.5, 'sd' => 1.2],
                38 => ['median' => 14.7, 'sd' => 1.2],
                39 => ['median' => 14.8, 'sd' => 1.2],
                40 => ['median' => 15.0, 'sd' => 1.2],
                41 => ['median' => 15.2, 'sd' => 1.2],
                42 => ['median' => 15.3, 'sd' => 1.2],
                43 => ['median' => 15.5, 'sd' => 1.3],
                44 => ['median' => 15.7, 'sd' => 1.3],
                45 => ['median' => 15.9, 'sd' => 1.3],
                46 => ['median' => 16.0, 'sd' => 1.3],
                47 => ['median' => 16.2, 'sd' => 1.3],
                48 => ['median' => 16.4, 'sd' => 1.3],
                49 => ['median' => 16.6, 'sd' => 1.3],
                50 => ['median' => 16.7, 'sd' => 1.3],
                51 => ['median' => 16.9, 'sd' => 1.3],
                52 => ['median' => 17.1, 'sd' => 1.3],
                53 => ['median' => 17.2, 'sd' => 1.3],
                54 => ['median' => 17.4, 'sd' => 1.3],
                55 => ['median' => 17.6, 'sd' => 1.3],
                56 => ['median' => 17.7, 'sd' => 1.3],
                57 => ['median' => 17.9, 'sd' => 1.3],
                58 => ['median' => 18.1, 'sd' => 1.3],
                59 => ['median' => 18.2, 'sd' => 1.3],
                60 => ['median' => 18.4, 'sd' => 1.3],
            ],
            'P' => [
                0 => ['median' => 3.2, 'sd' => 0.5],
                1 => ['median' => 4.2, 'sd' => 0.6],
                2 => ['median' => 5.1, 'sd' => 0.7],
                3 => ['median' => 5.8, 'sd' => 0.7],
                4 => ['median' => 6.4, 'sd' => 0.8],
                5 => ['median' => 6.9, 'sd' => 0.8],
                6 => ['median' => 7.3, 'sd' => 0.8],
                7 => ['median' => 7.6, 'sd' => 0.8],
                8 => ['median' => 7.8, 'sd' => 0.8],
                9 => ['median' => 8.1, 'sd' => 0.9],
                10 => ['median' => 8.4, 'sd' => 0.9],
                11 => ['median' => 8.6, 'sd' => 0.9],
                12 => ['median' => 8.9, 'sd' => 0.9],
                13 => ['median' => 9.1, 'sd' => 0.9],
                14 => ['median' => 9.3, 'sd' => 0.9],
                15 => ['median' => 9.6, 'sd' => 0.9],
                16 => ['median' => 9.8, 'sd' => 0.9],
                17 => ['median' => 10.0, 'sd' => 0.9],
                18 => ['median' => 10.2, 'sd' => 0.9],
                19 => ['median' => 10.4, 'sd' => 1.0],
                20 => ['median' => 10.6, 'sd' => 1.0],
                21 => ['median' => 10.8, 'sd' => 1.0],
                22 => ['median' => 11.1, 'sd' => 1.0],
                23 => ['median' => 11.3, 'sd' => 1.0],
                24 => ['median' => 11.5, 'sd' => 1.0],
                25 => ['median' => 11.7, 'sd' => 1.0],
                26 => ['median' => 11.8, 'sd' => 1.0],
                27 => ['median' => 12.0, 'sd' => 1.0],
                28 => ['median' => 12.1, 'sd' => 1.0],
                29 => ['median' => 12.3, 'sd' => 1.0],
                30 => ['median' => 12.4, 'sd' => 1.1],
                31 => ['median' => 12.6, 'sd' => 1.1],
                32 => ['median' => 12.8, 'sd' => 1.1],
                33 => ['median' => 12.9, 'sd' => 1.1],
                34 => ['median' => 13.1, 'sd' => 1.1],
                35 => ['median' => 13.2, 'sd' => 1.1],
                36 => ['median' => 13.4, 'sd' => 1.1],
                37 => ['median' => 13.6, 'sd' => 1.1],
                38 => ['median' => 13.7, 'sd' => 1.1],
                39 => ['median' => 13.8, 'sd' => 1.1],
                40 => ['median' => 14.0, 'sd' => 1.1],
                41 => ['median' => 14.2, 'sd' => 1.1],
                42 => ['median' => 14.3, 'sd' => 1.1],
                43 => ['median' => 14.4, 'sd' => 1.2],
                44 => ['median' => 14.6, 'sd' => 1.2],
                45 => ['median' => 14.8, 'sd' => 1.2],
                46 => ['median' => 14.9, 'sd' => 1.2],
                47 => ['median' => 15.0, 'sd' => 1.2],
                48 => ['median' => 15.2, 'sd' => 1.2],
                49 => ['median' => 15.4, 'sd' => 1.2],
                50 => ['median' => 15.6, 'sd' => 1.2],
                51 => ['median' => 15.8, 'sd' => 1.2],
                52 => ['median' => 16.0, 'sd' => 1.2],
                53 => ['median' => 16.2, 'sd' => 1.2],
                54 => ['median' => 16.4, 'sd' => 1.2],
                55 => ['median' => 16.5, 'sd' => 1.2],
                56 => ['median' => 16.7, 'sd' => 1.2],
                57 => ['median' => 16.9, 'sd' => 1.2],
                58 => ['median' => 17.1, 'sd' => 1.2],
                59 => ['median' => 17.3, 'sd' => 1.2],
                60 => ['median' => 17.5, 'sd' => 1.2],
            ],
        ];

        return $data[$jk][$umur] ?? null;
    }
    public static function hitungBMI($bb, $tb)
    {
        if (!$bb || !$tb || $tb == 0) return null;
        return round($bb / pow($tb / 100, 2), 2);
    }

    public static function klasifikasiBMIAnak($bmi, $umur, $jk)
    {
        if (!$bmi || !$umur || !$jk) return 'Data tidak lengkap';

        // Klasifikasi umum WHO Z-Score BMI for Age (simplified)
        if ($bmi < 14) {
            return 'Kurus';
        } elseif ($bmi >= 14 && $bmi <= 17) {
            return 'Normal';
        } elseif ($bmi > 17 && $bmi <= 19) {
            return 'Gemuk';
        } else {
            return 'Obesitas';
        }
    }
}
