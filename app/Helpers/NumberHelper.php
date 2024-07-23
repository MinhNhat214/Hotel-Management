<?php

if (!function_exists('format_currency')) {
    /**
     * Định dạng số tiền với 3 chữ số thập phân và dấu phân cách.
     *
     * @param float $amount
     * @return string
     */
    function format_currency($amount)
    {
        return number_format($amount, 3, ',', ',');
    }
}
