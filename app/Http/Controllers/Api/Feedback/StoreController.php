<?php

namespace App\Http\Controllers\Api\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use App\Http\Resources\NewsResource;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @throw $e
     * @return JsonResource
     */
    public function __invoke(StoreRequest $request): JsonResource
    {
        try {
            DB::beginTransaction();

            # Save feedback
            $feedback = Feedback::create(
                $request->validated()
            );

            # Attach cv document
            $feedback->addMediaFromRequest('cv_document')
                ->toMediaCollection('cv_document');

            # Attach other document
            if ($request->exists('other_document')) {
                $feedback->addMediaFromRequest('other_document')
                    ->toMediaCollection('other_document');
            }

            DB::commit();

           return JsonResource::make(['id' => $feedback->id]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error(__CLASS__, ['message' => $e->getMessage()]);

            abort(500, __('app.server.500'));
        }
    }
}
