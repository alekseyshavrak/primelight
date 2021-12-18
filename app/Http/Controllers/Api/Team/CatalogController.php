<?php

namespace App\Http\Controllers\Api\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResource
     */
    public function __invoke(): JsonResource
    {
        return TeamResource::collection(
            Team::all()
        );
    }
}
