<?php

namespace Tests\Feature\Controllers\Api;

use App\Menu;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test store action
     *
     * @return void
     */
    public function testStore(): void
    {
        $name = $this->faker->word;

        $request = [
            'name' => $name,
            'max_depth' => 5,
            'max_children' => 5
        ];

        $response = $this->json('POST', '/api/menus', $request);

        $response
            ->assertStatus(201)
            ->assertExactJson(
                [
                    'data' => [
                        'id' => 1,
                        'name' => $name,
                        'max_depth' => 5,
                        'max_children' => 5,
                    ]
                ]
            );
    }

    /**
     * Test store action with invalid payload
     *
     * @return void
     */
    public function testStoreMissingPayload(): void
    {
        $response = $this->json('POST', '/api/menus');

        $response->assertStatus(400);
    }

    /**
     * Test store action with invalid name
     *
     * @return void
     */
    public function testStoreInvalidName(): void
    {
        $request = [
            'name' => null,
        ];

        $response = $this->json('POST', '/api/menus', $request);

        $response->assertStatus(400);
    }

    /**
     * Test store action with invalid options
     *
     * @return void
     */
    public function testStoreInvalidMaxOptions(): void
    {
        $request = [
            'name' => 'test',
            'max_depth' => 'five',
            'max_children' => [5]
        ];

        $response = $this->json('POST', '/api/menus', $request);

        $response->assertStatus(400);
    }

    /**
     * Test show action
     *
     * @return void
     */
    public function testShow(): void
    {
        $menu = factory(Menu::class)->create();

        $response = $this->get('/api/menus/' . $menu->getId());

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $menu->getId(),
                        'name' => $menu->getName(),
                        'max_depth' => $menu->getMaxDepth(),
                        'max_children' => $menu->getMaxChildren(),
                    ]
                ]
            );
    }

    /**
     * Test show action with non exist menu
     *
     * @return void
     */
    public function testShowNotFound(): void
    {
        $response = $this->get('/api/menus/10000');

        $response->assertStatus(404);
    }

    /**
     * Test show action with invalid menu
     *
     * @return void
     */
    public function testShowInvalid(): void
    {
        $response = $this->get('/api/menus/test');

        $response->assertStatus(400);
    }

    /**
     * Test update action
     *
     * @return void
     */
    public function testUpdate(): void
    {
        $menu = factory(Menu::class)->create();
        $name = $this->faker->word;

        $request = [
            'name' => $name,
            'max_depth' => 4,
            'max_children' => 2,
        ];

        $response = $this->json('PUT', '/api/menus/' . $menu->getId(), $request);

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $menu->getId(),
                        'name' => $name,
                        'max_depth' => 4,
                        'max_children' => 2,
                    ]
                ]
            );
    }

    /**
     * Test update action
     *
     * @return void
     */
    public function testUpdatePatch(): void
    {
        $menu = factory(Menu::class)->create();
        $name = $this->faker->word;

        $request = [
            'name' => $name,
        ];

        $response = $this->json('PATCH', '/api/menus/' . $menu->getId(), $request);

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $menu->getId(),
                        'name' => $name,
                        'max_depth' => $menu->getMaxDepth(),
                        'max_children' => $menu->getMaxChildren(),
                    ]
                ]
            );
    }

    /**
     * Test update action with invalid payload
     *
     * @return void
     */
    public function testUpdateMissingPayload(): void
    {
        $menu = factory(Menu::class)->create();

        $response = $this->json('PUT', '/api/menus/' . $menu->getId());

        $response->assertStatus(400);
    }

    /**
     * Test store action with invalid name
     *
     * @return void
     */
    public function testUpdateInvalidName(): void
    {
        $menu = factory(Menu::class)->create();

        $request = [
            'name' => null,
        ];

        $response = $this->json('PUT', '/api/menus/' . $menu->getId(), $request);

        $response->assertStatus(400);
    }

    /**
     * Test store action with invalid options
     *
     * @return void
     */
    public function testUpdateInvalidMaxOptions(): void
    {
        $menu = factory(Menu::class)->create();

        $request = [
            'name' => 'test',
            'max_depth' => 'five',
            'max_children' => [5]
        ];

        $response = $this->json('PUT', '/api/menus/' . $menu->getId(), $request);

        $response->assertStatus(400);
    }

    /**
     * Test destroy action
     *
     * @return void
     */
    public function testDestroy(): void
    {
        $menu = factory(Menu::class)->create();

        $response = $this->json('DELETE', '/api/menus/' . $menu->getId());

        $response->assertStatus(204);
    }

    /**
     * Test destroy action
     *
     * @return void
     */
    public function testDestroyNotFound(): void
    {
        $response = $this->json('DELETE', '/api/menus/100004');

        $response->assertStatus(404);
    }

    /**
     * Test destroy action
     *
     * @return void
     */
    public function testDestroyInvalid(): void
    {
        $response = $this->json('DELETE', '/api/menus/test');

        $response->assertStatus(400);
    }
}
