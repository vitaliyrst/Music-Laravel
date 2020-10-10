<?php

namespace App\Services\Albums\Handlers;

use App\Models\Music\Album;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;
use Illuminate\Support\Facades\Request;

class UpdateAlbumHandler
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    public function __construct(
        AlbumRepositoryInterface $albumRepository
    )
    {
        $this->albumRepository = $albumRepository;
    }

    public function handle(Album $album, array $data)
    {
        if (!Request::file('cover')) {
            $data['cover'] = $album->cover;
        } else {
            $data['cover'] = $this->updateFile();
        }
        return $this->albumRepository->updateFromArray($album, $data);
    }

    public function updateFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')->store('/album', 'public');
            return '/storage/' . $file;
        } else {
            return null;
        }
    }
}