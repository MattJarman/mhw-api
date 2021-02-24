<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class ImageTest extends TestCase
{
    public function testMonsterSuccess(): void
    {
        $response = $this->get('/api/image/monster/1');

        $response->assertOk();
    }

    public function testMonsterNotFound(): void
    {
        $response = $this->get('/api/image/monster/-83843');

        $response->assertNotFound();
    }

    public function testEquipmentSuccess(): void
    {
        $response = $this->get('/api/image/equipment/1');

        $response->assertOk();
    }

    public function testEquipmentNotFound(): void
    {
        $response = $this->get('/api/image/equipment/-39279');

        $response->assertNotFound();
    }
}
