<?php

namespace App\Services;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeService
{
    public function generateBase64(string $data): string
    {
        $writer = new PngWriter();

        // إنشاء الرمز وتمرير المتغير القادم من الكنترولر
        $qrCode = new QrCode(
            data: $data,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 400,
            margin: 5,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        // التوليد بدون لوجو أو ليبل إضافي لضمان خفة وسرعة الإخراج
        $result = $writer->write($qrCode);

        // إرجاع رابط Data URI جاهز للعرض مباشرة في وسم <img src="...">
        return $result->getDataUri();
        
    }
}