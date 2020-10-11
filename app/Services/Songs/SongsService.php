<?php

namespace App\Services\Songs;

use App\Models\Music\Song;
use App\Services\Songs\Repositories\SongRepositoryInterface;

/**
 * Class SongsService
 * @package App\Services\Songs
 */
class SongsService
{
    /**
     * @var SongRepositoryInterface
     */
    private $songRepository;

    /**
     * SongsService constructor.
     * @param SongRepositoryInterface $songRepository
     */
    public function __construct(
        SongRepositoryInterface $songRepository
    )
    {
        $this->songRepository = $songRepository;
    }

    /**
     * @param array $data
     * @return Song
     */
    public function storeAlbum(array $data)
    {
        return $this->songRepository->createFromArray($data);
    }

    /**
     * @param Song $song
     * @param array $data
     * @return Song
     */
    public function updateSong(Song $song, array $data)
    {
        return $this->songRepository->updateFromArray($song, $data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function searchGroupsWithAlbums()
    {
        return $this->songRepository->getGroupsWithAlbums();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function searchAlbums()
    {
        return $this->songRepository->getAlbums();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function searchGroups()
    {
        return $this->songRepository->getGroups();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroySong($id)
    {
        return $this->songRepository->destroy($id);
    }
}
