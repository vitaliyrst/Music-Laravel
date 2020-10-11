<?php

namespace App\Services\Albums\Handlers;

use App\Models\Music\Album;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;
use Illuminate\Support\Facades\Request;

/**
 * Class CreateAlbumHandler
 * @package App\Services\Albums\Handlers
 */
class CreateAlbumHandler
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * CreateAlbumHandler constructor.
     * @param AlbumRepositoryInterface $albumRepository
     */
    public function __construct(
        AlbumRepositoryInterface $albumRepository
    )
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * @param array $data
     * @return Album
     */
    public function handle(array $data)
    {
        $data['cover'] = $this->saveFile();
        return $this->albumRepository->createFromArray($data);
    }

    /**
     * @return string|null
     */
    public function saveFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')->store('/album', 'public');
            return '/storage/' . $file;
        } else {
            return null;
        }
    }
}
