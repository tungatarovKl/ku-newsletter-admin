<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function testSendMessage(){
        $response = $this->post('/sendMessage');
        $response->assertRedirect('/newsletter');
    }

    public function testNewsletter(){
        $response = $this->get('/newsletter');
        $response->assertStatus(200);
    }
}
