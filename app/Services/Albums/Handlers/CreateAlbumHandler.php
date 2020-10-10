<?php

namespace App\Services\Albums\Handlers;

use App\Services\Albums\Repositories\AlbumRepositoryInterface;
use Illuminate\Support\Facades\Request;


class CreateAlbumHandler
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

    public function handle(array $data)
    {
        $data['cover'] = $this->saveFile();
        return $this->albumRepository->createFromArray($data);
    }

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