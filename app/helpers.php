<?php

if (!function_exists('activeSegment')) {
    function activeSegment($name, $segment = 2, $class = 'active')
    {
        return request()->segment($segment) == $name ? $class : '';
    }
}

if (!function_exists('numberToWords')) {
    function numberToWords($number)
    {
        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        $words = $formatter->format($number);

        // Capitalize the first letter of each word
        $capitalizedWords = ucwords($words);

        return $capitalizedWords;
    }
}

if (!function_exists('spellNumber')) {
    function spellNumber($myNumber)
    {
        // Split the number into dollars and cents
        $parts = explode('.', $myNumber);
        $dollars = isset($parts[0]) ? intval($parts[0]) : 0;
        $cents = isset($parts[1]) ? intval($parts[1]) : 0;

        // Spell the dollars part
        $dollarsText = ($dollars > 0) ? numberToWords($dollars) . ' Dollars' : 'No Dollars';

        // Spell the cents part
        $centsText = ($cents > 0) ? numberToWords($cents) . ' Cents' : 'No Cents';

        // Combine dollars and cents
        $result = $dollarsText;

        if ($cents > 0) {
            $result .= ' and ' . $centsText;
        }

        return $result;
    }

    function getHundreds($myNumber)
    {
        $result = '';

        if (intval($myNumber) === 0) {
            return $result;
        }

        $myNumber = str_pad($myNumber, 3, '0', STR_PAD_LEFT);

        if (substr($myNumber, 0, 1) !== '0') {
            $result = getDigit(substr($myNumber, 0, 1)) . ' Hundred ';
        }

        if (substr($myNumber, 1, 1) !== '0') {
            $result .= getTens(substr($myNumber, 1));
        } else {
            $result .= getDigit(substr($myNumber, 2));
        }

        return $result;
    }

}
