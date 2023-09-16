<?php

namespace App\Enums\Post;

enum Status : int
{
    case DRAFT = 0;
    case APPROVED = 5;
    case REJECTED = 10;

    public function text()
    {
        return match ($this->value) {
            self::DRAFT->value => 'Draft',
            self::APPROVED->value => 'Approved',
            self::REJECTED->value => 'Rejected'
        };
    }
}