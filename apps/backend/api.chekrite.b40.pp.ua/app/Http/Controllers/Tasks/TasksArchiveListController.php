<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TasksArchiveListController extends Controller
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
        return $this->responseSuccess($this->taskRepository->listArchive());
    }
}
