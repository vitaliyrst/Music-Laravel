<?php

namespace App\Services\Singers;

use App\Models\Music\Singer;
use App\Services\Singers\Handlers\CreateSingerHandler;
use App\Services\Singers\Handlers\UpdateSingerHandler;
use App\Services\Singers\Repositories\SingerRepositoryInterface;

/**
 * Class SingersService
 * @package App\Services\Singers
 */
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

    /**
     * SingersService constructor.
     * @param SingerRepositoryInterface $singerRepository
     * @param CreateSingerHandler $createSingerHandler
     * @param UpdateSingerHandler $updateSingerHandler
     */
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

    /**
     * @param array $data
     * @return Singer
     */
    public function storeSinger(array $data)
    {
        return $this->createSingerHandler->handle($data);
    }

    /**
     * @param Singer $singer
     * @param array $data
     * @return Singer
     */
    public function updateSinger(Singer $singer, array $data)
    {
        return $this->updateSingerHandler->handle($singer, $data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function searchAllGroups()
    {
        return $this->singerRepository->getGroups();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroySinger($id)
    {
        return $this->singerRepository->destroy($id);
    }
}
