<?php

function checkActiveLink($route): string
{
    return request()->routeIs($route) ? 'active' : '';
}

function currencyFormat($nominal, $prefix = 'Rp '): string
{
    return "$prefix " . number_format($nominal, 2);
}
