<?php
declare(strict_types=1);

namespace App\Dto\Tasks;

use App\Dto\AbstractDto;
use App\Enums\Tasks\Importance;

class TaskStoreDto extends AbstractDto
{
    readonly public string $title;
    readonly public ?string $description;
    readonly public string $importance;

    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->importance = Importance::from($values['importance'])->value;
    }
}
