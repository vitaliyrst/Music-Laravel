<?php

namespace App\Services\Singers;

use App\Models\Music\Singer;
use App\Services\Singers\Handlers\CreateSingerHandler;
use App\Services\Singers\Handlers\UpdateSingerHandler;
use App\Services\Singers\Repositories\SingerRepositoryInterface;

class SingersService
{
    /**
     * @var SingerRepositoryInterface
     */
    private $singerRepository;
    /**
     * @var CreateSingerHandler
     */
    private $createSingerHandler;
    /**
     * @var UpdateSingerHandler
     */
    private $updateSingerHandler;

    public function __construct(
        SingerRepositoryInterface $singerRepository,
        CreateSingerHandler $createSingerHandler,
        UpdateSingerHandler $updateSingerHandler
    )
    {
        $this->singerRepository = $singerRepository;
        $this->createSingerHandler = $createSingerHandler;
        $this->updateSingerHandler = $updateSingerHandler;
    }

    public function findSinger(int $id)
    {
        return $this->singerRepository->find($id);
    }

    public function storeSinger(array $data)
    {
        return $this->createSingerHandler->handle($data);
    }

    public function updateSinger(Singer $singer, array $data)
    {
        return $this->updateSingerHandler->handle($singer, $data);
    }

    public function searchAllGroups()
    {
        return $this->singerRepository->getGroups();
    }

    public function destroySinger($id)
    {
        return $this->singerRepository->destroy($id);
    }
}
