<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Team $team
     * @return JsonResource
     */
    public function __invoke(Team $team): JsonResource
    {
        return TeamResource::make($team);
    }
}
