<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phpsa\LaravelApiController\Model\Scopes\WithSoftDeletes;

class Checklist extends Model
{

    use SoftDeletes;
    use WithSoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'todo_id', 'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the todo that owns the checklist.
     */
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
