<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $preview_photo
 * @property mixed $id
 */
class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'shelf_number',
        'preview_photo',
        'total_nr_of_copies',
    ];

    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }


    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}
