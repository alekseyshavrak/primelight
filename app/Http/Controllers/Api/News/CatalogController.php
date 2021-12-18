<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
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
        return NewsResource::collection(
            News::all()
        );
    }
}
