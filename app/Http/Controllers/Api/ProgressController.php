<?php

namespace App\Http\Controllers\Api;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressResource;
use App\Http\Resources\ProgressCollection;
use App\Http\Requests\ProgressStoreRequest;
use App\Http\Requests\ProgressUpdateRequest;

class ProgressController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Progress::class);

        $search = $request->get('search', '');

        $progresses = Progress::search($search)
            ->latest()
            ->paginate();

        return new ProgressCollection($progresses);
    }

    /**
     * @param \App\Http\Requests\ProgressStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgressStoreRequest $request)
    {
        $this->authorize('create', Progress::class);

        $validated = $request->validated();

        $progress = Progress::create($validated);

        return new ProgressResource($progress);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Progress $progress)
    {
        $this->authorize('view', $progress);

        return new ProgressResource($progress);
    }

    /**
     * @param \App\Http\Requests\ProgressUpdateRequest $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function update(ProgressUpdateRequest $request, Progress $progress)
    {
        $this->authorize('update', $progress);

        $validated = $request->validated();

        $progress->update($validated);

        return new ProgressResource($progress);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Progress $progress)
    {
        $this->authorize('delete', $progress);

        $progress->delete();

        return response()->noContent();
    }
}
