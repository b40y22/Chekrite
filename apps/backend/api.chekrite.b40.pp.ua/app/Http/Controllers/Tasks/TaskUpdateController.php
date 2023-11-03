<?php
declare(strict_types=1);

namespace app\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TaskUpdateController extends Controller
{
    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    public function __invoke(UpdateTaskRequest $request): JsonResponse
    {
        $task =  $this->taskRepository->update($request->validatedDTO());

        if (!$task) {
            return $this->responseError([trans('api.notFound')], 404);
        }

        return $this->responseSuccess(['success']);
    }
}
