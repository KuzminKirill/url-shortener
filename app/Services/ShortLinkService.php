<?php

declare(strict_types=1);

namespace App\Services;

use App\Link;
use Hashids\Hashids;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ShortLinkService
{
    /** @var Hashids */
    private $hasher;

    public function __construct(Hashids $hasher)
    {
        $this->hasher = $hasher;
    }

    public function getShort(string $full): string  /* Check if short link already in db or create new */
    {
        return \DB::transaction(function () use ($full): string  {
            /** @var Link $link */
            $link = Link::query()
                ->where('full', $full)
                ->first();

            if ($link === null) {
                $lastId = Link::query()
                    ->latest('id')
                    ->max('id');

                $currentId = ($lastId ?: 0) + 1;

                $short = $this->hasher->encode($currentId);

                $link = new Link();
                $link->full = $full;
                $link->short = $short;

                $link->save();
            }

            return route('short', [
                'short' => $link->short,
            ]);
        });
    }

    /**
     * @param string $short
     *
     * @return string
     *
     * @throws ModelNotFoundException
     */
    public function getFull(string $short): string /*check full link in db or fail*/
    {
        /** @var Link $link */
        $link = Link::query()
            ->where('short', $short)
            ->firstOrFail();

        return $link->full;
    }
}
