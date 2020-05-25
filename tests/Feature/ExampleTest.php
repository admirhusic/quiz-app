<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Quiz;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function only_loggedin_user_can_see_create_quiz_view()
    {
        $response = $this->get('quiz/create')
                        ->assertRedirect('/login');
    }
    
    /** @test */
    public function only_auth_users_can_create_quizzes()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('quiz/create')
        ->assertOk();
    }

    /** @test */
    public function a_quiz_can_be_added_to_the_database() 
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('quiz/store', [
            'name'  => 'Test quiz',
            'description' => 'Test description' 
        ]);

        $this->assertCount(1, Quiz::all());
    }
}
