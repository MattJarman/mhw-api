<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class ImageControllerTest extends TestCase
{
    public function testItReturnsImage(): void
    {
        $response = $this->get('/api/image/monster/1');

        $response->assertOk();
    }
}
