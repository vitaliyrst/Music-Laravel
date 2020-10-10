<?php

namespace App\Services\Albums;

use App\Models\Music\Album;
use App\Services\Albums\Handlers\CreateAlbumHandler;
use App\Services\Albums\Handlers\UpdateAlbumHandler;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;

class AlbumsService
{
    /**
     * @var CreateAlbumHandler
     */
    private $createAlbumHandler;
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;
    /**
     * @var UpdateAlbumHandler
     */
    private $updateAlbumHandler;

    public function __construct(
        AlbumRepositoryInterface $albumRepository,
        CreateAlbumHandler $createAlbumHandler,
        UpdateAlbumHandler $updateAlbumHandler
    )
    {
        $this->albumRepository = $albumRepository;
        $this->createAlbumHandler = $createAlbumHandler;
        $this->updateAlbumHandler = $updateAlbumHandler;
    }

    public function findAlbum(int $id)
    {
        return $this->albumRepository->find($id);
    }

    public function storeAlbum(array $data)
    {
        return $this->createAlbumHandler->handle($data);
    }

    public function updateAlbum(Album $group, array $data)
    {
        return $this->updateAlbumHandler->handle($group, $data);
    }

    public function searchAllGroups()
    {
        return $this->albumRepository->getGroups();
    }

    public function destroyAlbum($id)
    {
        return $this->albumRepository->destroy($id);
    }
}