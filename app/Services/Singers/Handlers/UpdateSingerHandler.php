<?php

namespace App\Services\Singers\Handlers;

use App\Models\Music\Singer;
use App\Services\Singers\Repositories\SingerRepositoryInterface;
use Illuminate\Support\Facades\Request;

class UpdateSingerHandler
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

    public function handle(Singer $singer, array $data)
    {
        if (!Request::file('cover')) {
            $data['cover'] = $singer->cover;
        } else {
            $data['cover'] = $this->updateFile();
        }
        return $this->singerRepository->updateFromArray($singer, $data);
    }

    public function updateFile()
    {
        if (Request::hasFile('cover')) {
            $file = Request::file('cover')->store('/singer', 'public');
            return '/storage/' . $file;
        } else {
            return null;
        }
    }
}
