<?php

namespace App\Services\Singers\Handlers;

use App\Services\Singers\Repositories\SingerRepositoryInterface;
use Illuminate\Support\Facades\Request;

/**
 * Class CreateSingerHandler
 * @package App\Services\Singers\Handlers
 */
class CreateSingerHandler
{
    /**
     * @var SingerRepositoryInterface
     */
    private $singerRepository;

    /**
     * CreateSingerHandler constructor.
     * @param SingerRepositoryInterface $singerRepository
     */
    public function __construct(
        SingerRepositoryInterface $singerRepository
    )
    {
        $this->singerRepository = $singerRepository;
    }

    /**
     * @param array $data
     * @return \App\Models\Music\Singer
     */
    public function handle(array $data)
    {
        $data['cover'] = $this->saveFile();
        return $this->singerRepository->createFromArray($data);
    }

    /**
     * @return string|null
     */
    public function saveFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')->store('/singer', 'public');
            return '/storage/' . $file;
        } else {
            return null;
        }
    }
}
