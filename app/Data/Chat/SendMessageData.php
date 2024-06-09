<?php

namespace App\Data\Chat;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class SendMessageData extends Data
{
    public function __construct(
        public string $message,
    ) {
    }
}
