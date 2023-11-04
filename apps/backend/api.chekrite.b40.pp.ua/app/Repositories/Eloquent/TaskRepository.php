<?php
declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Dto\Tasks\TaskStoreDto;
use App\Dto\Tasks\TaskUpdateDto;
use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Support\Facades\Log;
use PHPUnit\Logging\Exception;

class TaskRepository extends AbstractRepository implements TaskRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Task::class);
    }

    /**
     * @param TaskStoreDto $taskStoreDto
     * @return mixed
     */
    public function store(TaskStoreDto $taskStoreDto): mixed
    {
        try {
            return $this->model::create(array_merge(
                $taskStoreDto->toArray(),
                [
                    'user_id' => 1,
                    'active' => true
                ]
            ));
        } catch (Exception $e) {
            Log::error('[TaskRepository:store] Can not store task');

            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param TaskUpdateDto $taskUpdateDto
     * @return mixed
     */
    public function update(TaskUpdateDto $taskUpdateDto)
    {
        return $this->model::where('id', $taskUpdateDto->id)
            ->update($taskUpdateDto->forSave());
    }

    /**
     * @param int $taskId
     * @return array
     */
    public function get(int $taskId): array
    {
        return $this->model::where([
            'id' => $taskId,
            'active' => true
        ])->get()->toArray();
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->model::with('user')->where('active', true)->get()->toArray();
    }

    /**
     * @return array
     */
    public function listArchive(): array
    {
        return $this->model::with('user')->where('active', false)->get()->toArray();
    }

    /**
     * @param int $taskId
     * @return bool
     */
    public function delete(int $taskId): bool
    {
        return (bool) $this->model::where('id', $taskId)->delete();
    }

    /**
     * @param int $taskId
     * @return bool
     */
    public function close(int $taskId): bool
    {
        return (bool) $this->model::where('id', $taskId)->update([
            'active' => false
        ]);
    }

    /**
     * @param int $taskId
     * @return bool
     */
    public function activate(int $taskId): bool
    {
        return (bool) $this->model::where('id', $taskId)->update([
            'active' => true
        ]);
    }
}
