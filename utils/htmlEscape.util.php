<?php

// It safely escapes special characters in a string for use in HTML output
// Helping prevent Cross-Site Scripting (XSS) attacks

function htmlEscape(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}