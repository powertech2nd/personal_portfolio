<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];


    public function techStacks()
    {
        return $this->belongsToMany(TechStack::class, 'projects_tech_stacks', 'project_id', 'tech_stack_id');
    }

    public function workplace()
    {
        return $this->belongsTo(Workplace::class, 'workplace_id', 'id');
    }
}
