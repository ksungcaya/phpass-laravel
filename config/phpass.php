<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Iteration Count
    |--------------------------------------------------------------------------
    | Default iteration count when hashing the password.
    |
    | The two digit cost parameter is the base-2 logarithm of the iteration count 
    | for the underlying Blowfish-based hashing algorithmeter and must be in range 04-31
    | Any values outside this range will default to 8.
    |
    */
    'iteration_count' => 8,

    /*
    |--------------------------------------------------------------------------
    | Portable Hashes
    |--------------------------------------------------------------------------
    | 
    | If set to true, PHPass password hasher will use a default hashing
    | capability which enables compatibility to lower versions of PHP.
    | which does not have Blowfish compatibility.
    |
    | By default this is set to false to force the hasher 
    | to use Blowfish algorithm which is more secure.
    |
    */
    'portable_hashes' => false
];