<?php
declare(strict_types=1);

namespace app\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TaskGetController extends Controller
{
    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    /**
     * @param int $taskId
     * @return JsonResponse
     */
    public function __invoke(int $taskId): JsonResponse
    {
        $task = $this->taskRepository->get($taskId);

        if (!$task) {
            return $this->responseError([trans('api.notFound')], 404);
        }

        return $this->responseSuccess($task[0]);
    }
}
