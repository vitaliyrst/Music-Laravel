<?php

namespace App\Services\Singers\Repositories;

use App\Models\Music\Singer;
use Illuminate\Support\Collection;

interface SingerRepositoryInterface
{
    public function find(int $id);

    public function createFromArray(array $data): Singer;

    public function updateFromArray(Singer $singer, array $data);

    public function getGroups(): Collection;

    public function destroy(int $id);
}
