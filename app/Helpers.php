<?php

if (!function_exists('autoLinkUrls')) {
    function autoLinkUrls($text) {
        return preg_replace_callback(
            '/(https?:\/\/[^\s]+)/',
            function($matches) {
                return '<a href="' . $matches[1] . '" target="_blank" rel="noopener noreferrer" style="color: #333; font-weight: 500; background-color: #ffc107;">' . $matches[1] . '</a>';
            },
            $text
        );
    }
}


function makeBold($instructions) {
    // Define the words or patterns you want to make bold
    $boldWords = ['step', 'Step', '\*', 'number']; // Escaping the '*' character with '\'
    $numberRange = range(1, 1000);
    $boldWords = array_merge($boldWords, array_map('strval', $numberRange));

    // Create a regular expression pattern to match the words or patterns
    $pattern = '/\b(' . implode('|', $boldWords) . ')\b/';

    // Replace the matched words or patterns with <strong> tags to make them bold
    return preg_replace($pattern, '<strong>$1</strong>', $instructions);
}