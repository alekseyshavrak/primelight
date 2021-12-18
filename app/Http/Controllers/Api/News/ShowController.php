<?php

namespace App\Http\Controllers\Api\News;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param News $news
     * @return JsonResource
     */
    public function __invoke(News $news): JsonResource
    {
        return NewsResource::make($news);
    }
}
