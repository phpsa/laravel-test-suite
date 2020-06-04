<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phpsa\LaravelApiController\Model\Scopes\WithSoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    use WithSoftDeletes;

    protected $fillable = [
        'user_id', 'title'
    ];

        /**
     * Get the user that owns the todo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the checklists for the todo.
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
