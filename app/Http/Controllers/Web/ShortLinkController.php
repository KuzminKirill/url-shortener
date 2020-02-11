<?php

namespace App\Http\Controllers\Web;

use App\Services\ShortLinkService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ShortLinkController
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
     * @return RedirectResponse
     */
    public function __invoke(string $short): RedirectResponse
    {
        $full = $this->shortLinkService->getFull($short);

        return Redirect::to($full, 308);
    }
}
