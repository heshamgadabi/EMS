<?php

namespace App\Services;

class BarcodeService
{
    // جدول تشفير مبسط لأرقام Code 128 (أو أرقام متسلسلة 0-9)
    protected static array $patterns = [
        '0' => '11011001100', '1' => '11001101100', '2' => '11001100110',
        '3' => '10010011000', '4' => '10010001100', '5' => '10001001100',
        '6' => '10011001000', '7' => '10011000100', '8' => '10001100100',
        '9' => '11001001000', '-' => '10111100010', 'A' => '11110101000'
    ];

    public static function generateSvg(string $code, int $height = 50): string
    {
        $code = strtoupper($code);
        $binary = '11010010000'; // رمز البداية Start Code

        for ($i = 0; $i < strlen($code); $i++) {
            $char = $code[$i];
            $binary .= self::$patterns[$char] ?? '10010011000';
        }

        $binary .= '1100011101011'; // رمز التوقف Stop Code
        $width = strlen($binary);

        $svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 {$width} {$height}' width='100%' height='{$height}' preserveAspectRatio='none'>";
        for ($pos = 0; $pos < $width; $pos++) {
            if ($binary[$pos] === '1') {
                $svg .= "<rect x='{$pos}' y='0' width='1' height='{$height}' fill='#14213d' />";
            }
        }
        $svg .= "</svg>";

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}