<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\PersonalRecord;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request, $movementName)
    {
        $movement = Movement::where('name', $movementName)->first();

        if (!$movement) {
            return response()->json(['error' => 'Movimento não encontrado'], 404);
        }

        $records = PersonalRecord::with('user')
            ->where('movement_id', $movement->id)
            ->orderBy('value', 'desc')
            ->get();

        $ranking = [];
        $position = 1;
        $previousValue = null;

        foreach ($records as $record) {
            if ($record->value !== $previousValue) {
                $previousValue = $record->value;
            }

            $ranking[] = [
                'position' => $position,
                'user' => $record->user->name,
                'personal_record' => $record->value,
                'date' => $record->date
            ];

            $position++;
        }

        return response()->json($ranking);
    }
}
