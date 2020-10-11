<?php

namespace App\Services\Albums;

use App\Models\Music\Album;
use App\Services\Albums\Handlers\CreateAlbumHandler;
use App\Services\Albums\Handlers\UpdateAlbumHandler;
use App\Services\Albums\Repositories\AlbumRepositoryInterface;

/**
 * Class AlbumsService
 * @package App\Services\Albums
 */
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

    /**
     * AlbumsService constructor.
     * @param AlbumRepositoryInterface $albumRepository
     * @param CreateAlbumHandler $createAlbumHandler
     * @param UpdateAlbumHandler $updateAlbumHandler
     */
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

    /**
     * @param array $data
     * @return Album
     */
    public function storeAlbum(array $data)
    {
        return $this->createAlbumHandler->handle($data);
    }

    /**
     * @param Album $group
     * @param array $data
     * @return Album
     */
    public function updateAlbum(Album $group, array $data)
    {
        return $this->updateAlbumHandler->handle($group, $data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function searchAllGroups()
    {
        return $this->albumRepository->getGroups();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyAlbum($id)
    {
        return $this->albumRepository->destroy($id);
    }
}