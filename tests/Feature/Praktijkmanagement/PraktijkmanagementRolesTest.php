<?php

namespace Tests\Feature\Praktijkmanagement;

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PraktijkmanagementRolesTest extends TestCase
{
    public function test_praktijkmanagement_roles_page_renders_correctly()
    {
        // Arrange
        $user = User::factory()->create();
        User::factory()->count(5)->create();

        // Act
        $response = $this->actingAs($user)
            ->get(route('rolemanagement.dashboard'));

        // Assert
        $response->assertStatus(200);

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Praktijkmanagement/PraktijkmanagementDashboard')
            ->has('users', 5)
            ->where('title', 'Manage Praktijkmanagement Roles')
        );
    }
}
