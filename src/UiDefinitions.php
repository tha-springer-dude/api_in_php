<?php

    class UiDefinitions{
    
            public function eol() {
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
            $accept = $_SERVER['HTTP_ACCEPT'] ?? '';

            // Detect curl or Postman
            if (str_contains($ua, 'curl') || str_contains($ua, 'PostmanRuntime')) {
                return "\n";
            }

            // Fallback: treat browser-like as HTML
            return "<br />";
        }

    }

?>