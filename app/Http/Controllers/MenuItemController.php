<?php

namespace App\Http\Controllers;

use App\Services\Item\ItemServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $menu
     *
     * @return JsonResponse
     */
    public function store(Request $request, int $menu): JsonResponse
    {
        $input = $request->all();
        $input['menu_id'] = $menu;
        $data = $this->itemService->storeItem($input);

        return response()->json($data['item'] ?? [], JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param mixed $menu
     *
     * @return JsonResponse
     */
    public function show($menu): JsonResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($menu)
    {
        //
    }
}
