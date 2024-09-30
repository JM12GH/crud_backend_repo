<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(array|string|null $perPage)
 * @method static create(array $data)
 * @method static find(int $id)
 */
class StudentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'max_allow',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
