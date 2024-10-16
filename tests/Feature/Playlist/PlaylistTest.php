<?php

namespace Tests\Feature\Playlist;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PlaylistTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_login_and_see_playlists(): void
    {
       
        $this->authenticate($response);
        $response->assertRedirect(route('playlist.index', absolute: false));

        // $response->assertStatus(302);

          $response = $this->get('/playlist');
          $response->assertSee("Playlists");
         $response->assertSee("Create Playlist");
         $response->assertSee("Create Playlist");
    }
    public function authenticate($response){

        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
    }

}
