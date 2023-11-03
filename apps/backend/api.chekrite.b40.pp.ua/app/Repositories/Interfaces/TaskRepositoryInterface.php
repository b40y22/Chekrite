<?php

namespace App\Repositories\Interfaces;

use App\Dto\Tasks\TaskStoreDto;
use App\Dto\Tasks\TaskUpdateDto;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface extends AbstractRepositoryInterface
{
    /**
     * @param TaskStoreDto $taskStoreDto
     * @return mixed
     */
    public function store(TaskStoreDto $taskStoreDto);

    /**
     * @param TaskUpdateDto $taskUpdateDto
     * @return mixed
     */
    public function update(TaskUpdateDto $taskUpdateDto);

    /**
     * @param int $taskId
     * @return array
     */
    public function get(int $taskId): array;

    /**
     * @return array
     */
    public function list(): array;


    /**
     * @param int $taskId
     * @return bool
     */
    public function delete(int $taskId): bool;
}
