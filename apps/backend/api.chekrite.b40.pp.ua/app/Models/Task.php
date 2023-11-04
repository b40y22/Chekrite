<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\Tasks\Importance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',

        'active',
        'description',
        'importance',
        'title',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $value
     * @return Importance
     */
    public function getImportanceAttribute($value): Importance
    {
        return Importance::from($value);
    }

    /**
     * @param $value
     * @return void
     */
    public function setImportanceAttribute($value): void
    {
        $this->attributes['importance'] = Importance::from($value)->value;
    }
}

