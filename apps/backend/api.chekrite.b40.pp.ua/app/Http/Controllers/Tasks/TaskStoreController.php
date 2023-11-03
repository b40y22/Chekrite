<?php
declare(strict_types=1);

namespace app\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TaskStoreController extends Controller
{
    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    /**
     * @param StoreTaskRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreTaskRequest $request): JsonResponse
    {
        return $this->responseSuccess(
            $this->taskRepository->store($request->validatedDTO())->toArray(),
            201
        );
    }
}
