<?php
return [
  'quote_limit' => env('QUOTE_LIMIT', 5),
  'quote_internal' => env('QUOTE_INTERVAL', 60000),
  'basic_user' => env('BASIC_USER', 'user'),
  'basic_password' => env('BASIC_PASSWORD', 'password'),
  'api_key' => env('API_KEY', ''),
];
