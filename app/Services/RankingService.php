<?php

namespace App\Services;

use App\Models\Movement;

class RankingService
{
    public function getRanking(Movement $movement, $page, $perPage)
    {
        $records = $movement->personalRecords()
            ->with('user')
            ->orderBy('value', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        return $records;
    }
}
