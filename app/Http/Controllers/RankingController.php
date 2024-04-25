<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Services\RankingService;
use App\Http\Resources\RankingResource;

class RankingController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function index(Request $request, $movementName)
    {
        $movement = Movement::where('name', $movementName)->first();

        if (!$movement) {
            return response()->json(['error' => 'Movimento não encontrado'], 404);
        }

        $page = $request->query('page', 1);
        $perPage = $request->query('perPage', 10);

        $ranking = $this->rankingService->getRanking($movement, $page, $perPage);

        return RankingResource::collection($ranking);
    }
}
