<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mappers\Item\ItemIndexMapper;
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

    public function index(): JsonResponse
    {
        $index = $this->itemRepository->index(App::getLocale());
        $response = (new ItemIndexMapper($index))->get();

        return new JsonResponse($response);
    }
}
