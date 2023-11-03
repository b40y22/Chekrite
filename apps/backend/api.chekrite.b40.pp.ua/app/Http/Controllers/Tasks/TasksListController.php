<?php
declare(strict_types=1);

namespace app\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TasksListController extends Controller
{
    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $list = $this->taskRepository->list();

        if (!$list) {
            return $this->responseError([trans('api.notFound')], 404);
        }

        return $this->responseSuccess($list);
    }
}
