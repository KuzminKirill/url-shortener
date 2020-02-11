<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\ShortLinkCreateRequest;
use App\Services\ShortLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShortLinkController extends Controller
{
    /** @var ShortLinkService */
    private $shortLinkService;

    public function __construct(ShortLinkService $shortLinkService)
    {
        $this->shortLinkService = $shortLinkService;
    }

    /**
     * @param string $short
     *
     * @return JsonResponse
     */
    public function show(string $short): JsonResponse
    {
        $full = $this->shortLinkService->getFull($short);

        return response()->json([
            'short' => route('short', compact('short')),
            'full' => $full,
        ]);
    }

    /**
     * @param ShortLinkCreateRequest $request
     *
     * @return JsonResponse
     */
    public function store(ShortLinkCreateRequest $request): JsonResponse
    {
        $full = $request->get('full');

        $short = $this->shortLinkService->getShort($full);

        return response()->json([
            'short' => $short,
            'full' => $full,
        ]);
    }
}
