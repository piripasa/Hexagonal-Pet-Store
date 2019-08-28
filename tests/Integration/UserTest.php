<?php

namespace Tests\Integration;

use Hexa\Shop\Infrastructure\Persistence\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    function testCreateUser()
    {
        $user = factory(User::class)->create();
        $this->assertIsInt($user->id);
    }

}
