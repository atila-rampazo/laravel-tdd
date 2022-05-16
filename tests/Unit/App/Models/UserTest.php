<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Sanctum\HasApiTokens;

class UserTest extends ModelTestCase
{

    protected function model(): Model
    {
        return new User();
    }


    /**
     * @return array
     */
    protected function expectedTraits(): array
    {
        return [
            HasApiTokens::class,
            HasFactory::class,
            Notifiable::class
        ];
    }

    /**
     * @return array
     */
    protected function expectedFillables(): array
    {
        return [
            'name',
            'email',
            'password',
        ];
    }

    /**
     * @return array
     */
    protected function expectedCasts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
        ];
    }
}
