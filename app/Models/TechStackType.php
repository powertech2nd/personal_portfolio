<?php

namespace App\Models;

use App\Models\TechStack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechStackType extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tech_stack_types';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];


    public function techStacks()
    {
        return $this->hasMany(TechStack::class, 'tech_stack_type_id', 'id');
    }
}
