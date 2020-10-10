<?php

namespace App\Services\Singers\Repositories;

use App\Models\Music\Group;
use App\Models\Music\Singer;
use Illuminate\Support\Collection;

class SingerRepository implements SingerRepositoryInterface
{

    public function find(int $id)
    {
        Singer::find($id);
    }

    public function createFromArray(array $data): Singer
    {
        $singer = new Singer();
        $singer->create($data);
        return $singer;
    }

    public function updateFromArray(Singer $singer, array $data)
    {
        $singer->update($data);
        return $singer;
    }

    public function getGroups(): Collection
    {
        return Group::orderBy('id')->get();
    }

    public function destroy(int $id)
    {
        return Singer::destroy($id);
    }
}
