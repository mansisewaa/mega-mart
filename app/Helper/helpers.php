<?php

if (!function_exists('formatRupees')) {
    /**
     * Format number into Indian Rupee style
     *
     * @param float|int $amount
     * @param bool $withSymbol
     * @return string
     */
    function formatRupees($amount, $withSymbol = true)
    {
        $amount = round($amount, 2);

        // Break into integer and decimal
        $parts = explode('.', number_format($amount, 2, '.', ''));
        $intPart = $parts[0];
        $decimalPart = $parts[1];

        // Handle Indian numbering format
        $lastThree = substr($intPart, -3);
        $restUnits = substr($intPart, 0, -3);

        if ($restUnits != '') {
            $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits);
        }

        $formatted = $restUnits . ($restUnits == '' ? $lastThree : "," . $lastThree) . "." . $decimalPart;

        return $withSymbol ? "₹" . $formatted : $formatted;
    }
}



?>
