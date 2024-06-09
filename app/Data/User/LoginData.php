<?php

namespace App\Data\User;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class LoginData extends Data
{
    public function __construct(
        #[Email]
        public string $email,
        public string $password
    ) {
    }
}
