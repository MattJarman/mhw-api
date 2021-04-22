<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ItemShowRequest;
use App\Mappers\Item\ItemIndexMapper;
use App\Mappers\Item\ItemShowMapper;
use App\Repositories\ItemRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;

class ItemController extends Controller
{
    private ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @group Item
     * @queryParam language string The language for names and descriptions. Defaults to 'en'.
     * @responseFile storage/responses/item/index.json
     */
    public function index(): JsonResponse
    {
        $index = $this->itemRepository->index(App::getLocale());
        $response = (new ItemIndexMapper($index))->get();

        return new JsonResponse($response);
    }

    /**
     * @param ItemShowRequest $request
     *
     * @group Item
     * @urlParam item integer required The ID of the item.
     * @queryParam language string The language for names and descriptions. Defaults to 'en'.
     * @responseFile storage/responses/item/show.json
     */
    public function show(ItemShowRequest $request): JsonResponse
    {
        $item = $this->itemRepository->show((int) $request->route('item'), App::getLocale());
        $response = (new ItemShowMapper($item))->get();

        return new JsonResponse($response);
    }
}
