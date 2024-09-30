<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $data)
 * @method static paginate(array|string|null $perPage)
 * @method static findOrFail(string $id)
 */
class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];


    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}

