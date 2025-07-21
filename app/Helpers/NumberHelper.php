<?php

namespace App\Helpers;

use NumberFormatter;

class NumberHelper
{
    public static function toWords($number)
    {
        $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return ucwords($formatter->format($number)) . ' only';
    }
}
