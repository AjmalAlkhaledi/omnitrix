<?php

declare(strict_types=1);

// Password hashing for Hash::make() / Hash::check(): bcrypt or argon2id.
return [
    'driver' => 'bcrypt',
    'bcrypt' => ['rounds' => 12],
    'argon' => ['memory' => 65536, 'time' => 4, 'threads' => 1],
];
