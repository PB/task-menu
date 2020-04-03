<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Menu\MenuServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @var MenuServiceInterface
     */
    private $menuService;

    /**
     * MenuController constructor.
     *
     * @param MenuServiceInterface $menuService
     */
    public function __construct(MenuServiceInterface $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $this->menuService->storeMenu($request->all());

        return response()->json($data['menu'] ?? [], JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $menu
     * @return JsonResponse
     */
    public function show($menu): JsonResponse
    {
        $data = $this->menuService->showMenu(['id' => $menu]);

        return response()->json($data['menu'] ?? []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed  $menu
     * @return JsonResponse
     */
    public function destroy($menu): JsonResponse
    {
        $this->menuService->destroyMenu(['id' => $menu]);

        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}
