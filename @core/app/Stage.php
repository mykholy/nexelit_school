<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Stage extends Model
{
    protected $table = 'stages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'admin_id',
    ];
    protected $with = 'admin';

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }


}
