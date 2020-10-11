<?php

namespace App\Services\Albums\Handlers;

use App\Models\Music\Album;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;
use Illuminate\Support\Facades\Request;

/**
 * Class UpdateAlbumHandler
 * @package App\Services\Albums\Handlers
 */
class UpdateAlbumHandler
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * UpdateAlbumHandler constructor.
     * @param AlbumRepositoryInterface $albumRepository
     */
    public function __construct(
        AlbumRepositoryInterface $albumRepository
    )
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * @param Album $album
     * @param array $data
     * @return Album
     */
    public function handle(Album $album, array $data): Album
    {
        if (!Request::file('cover')) {
            $data['cover'] = $album->cover;
        } else {
            $data['cover'] = $this->updateFile();
        }
        return $this->albumRepository->updateFromArray($album, $data);
    }

    /**
     * @return string|null
     */
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
