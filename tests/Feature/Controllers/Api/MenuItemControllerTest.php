<?php
declare(strict_types=1);

namespace Tests\Feature\Controllers\Api;

use App\Item;
use App\Menu;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuItemControllerTest extends TestCase
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
        $menu = factory(Menu::class)->create();

        $name1 = $this->faker->word;
        $name2 = $this->faker->word;
        $name3 = $this->faker->word;
        $name4 = $this->faker->word;

        $request = [
            [
                'name' => $name1,
                'children' => [
                    [
                        'name' => $name2,
                        'children' => []
                    ],
                    [
                        'name' => $name3,
                    ]
                ],
            ],
            [
                'name' => $name4,
            ]
        ];

        $response = $this->json('POST', '/api/menus/' . $menu->id . '/items', $request);

        // that is not tbe best test :/
        $response
            ->assertStatus(201)
            ->assertExactJson(
                [
                    [
                        'id' => 1,
                        'name' => $name1,
                        'children' => [
                            [
                                'id' => 2,
                                'name' => $name2,
                                'children' => []
                            ],
                            [
                                'id' => 3,
                                'name' => $name3,
                                'children' => []
                            ]
                        ],
                    ],
                    [
                        'id' => 4,
                        'name' => $name4,
                        'children' => []
                    ]
                ]
            );
    }

    /**
     * Test show action
     *
     * @return void
     */
    public function testShow(): void
    {
        $item = factory(Item::class)->create();
        $response = $this->json('GET', '/api/menus/' . $item->menu_id . '/items');

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    [
                        'id' => $item->id,
                        'name' => $item->name,
                        'children' => []
                    ]
                ]
            );
    }

    // todo: add tests
}
