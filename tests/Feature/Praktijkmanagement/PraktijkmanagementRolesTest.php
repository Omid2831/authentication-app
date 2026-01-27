<?php

namespace Tests\Feature\Praktijkmanagement;

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PraktijkmanagementRolesTest extends TestCase
{
    public function test_manage_roles_page_renders_correctly()
    {
        // Arrange
        $pk = User::factory()->create(['role' => 'praktijkmanagement']);
        User::factory()->count(5)->create(['role' => 'patient']);

        // Act
        $response = $this->actingAs($pk)
            ->get(route('praktijkmanagement.manageRoles'));

        // Assert
        $response->assertStatus(200);

        $response->assertInertia(
            fn(Assert $page) => $page
                ->component('features/Praktijkmanagement/PraktijkmanagementDashboard')
                ->has('users')
                ->where('title', 'Manage Praktijkmanagement Roles')
        );
    }
}
