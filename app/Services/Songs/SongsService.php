<?php

namespace App\Services\Songs;

use App\Models\Music\Song;
use App\Services\Songs\Handlers\CreateSongHandler;
use App\Services\Songs\Handlers\UpdateSongHandler;
use App\Services\Songs\Repositories\SongRepositoryInterface;

class SongsService
{
    /**
     * @var SongRepositoryInterface
     */
    private $songRepository;
    /**
     * @var CreateSongHandler
     */
    private $createSongHandler;
    /**
     * @var UpdateSongHandler
     */
    private $updateSongHandler;

    public function __construct(
        SongRepositoryInterface $songRepository,
        CreateSongHandler $createSongHandler,
        UpdateSongHandler $updateSongHandler
    )
    {
        $this->songRepository = $songRepository;
        $this->createSongHandler = $createSongHandler;
        $this->updateSongHandler = $updateSongHandler;
    }

    public function findSong(int $id)
    {
        return $this->songRepository->find($id);
    }

    public function storeAlbum(array $data)
    {
        return $this->songRepository->createFromArray($data);
    }

    public function updateSong(Song $song, array $data)
    {
        return $this->songRepository->updateFromArray($song, $data);
    }

    public function searchGroupsWithAlbums()
    {
        return $this->songRepository->getGroupsWithAlbums();
    }

    public function searchAlbums()
    {
        return $this->songRepository->getAlbums();
    }

    public function searchGroups()
    {
        return $this->songRepository->getGroups();
    }

    public function destroySong($id)
    {
        return $this->songRepository->destroy($id);
    }
}
