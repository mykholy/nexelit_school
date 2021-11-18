<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'stage_id',
    ];
    protected $with = 'stage';

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }


}
