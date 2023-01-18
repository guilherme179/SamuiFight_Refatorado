<?php

namespace src;

use Tuupola\Middleware\JwtAuthentication;

function jwtAuth(): JwtAuthentication {
    
    return new JwtAuthentication([
        'secret' => '$2y$10$HqqlC5xRnQvXZcN6kJCZdOmuz/7Y0kvTO4SaC8tvevuIDuXfbrOgW',
        'attribute' => 'jwt'
    ]);
}