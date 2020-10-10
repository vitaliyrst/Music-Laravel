<?php

namespace App\Services\Songs\Handlers;

use App\Services\Songs\Repositories\SongRepositoryInterface;

class CreateSongHandler
{
    /**
     * @var SongRepositoryInterface
     */
    private $songRepository;

    public function __construct(
        SongRepositoryInterface $songRepository
    )
    {
        $this->songRepository = $songRepository;
    }
}
