<?php

namespace App\Services\Singers\Handlers;

use App\Services\Singers\Repositories\SingerRepositoryInterface;
use Illuminate\Support\Facades\Request;

class CreateSingerHandler
{
    /**
     * @var SingerRepositoryInterface
     */
    private $singerRepository;

    public function __construct(
        SingerRepositoryInterface $singerRepository
    )
    {
        $this->singerRepository = $singerRepository;
    }

    public function handle(array $data)
    {
        $data['cover'] = $this->saveFile();
        return $this->singerRepository->createFromArray($data);
    }

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