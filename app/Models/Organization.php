<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $table = 'organizations';
    protected $primaryKey = 'id';

    public function users() {
        return $this->hasMany('App\Models\User')->orderBy('created_at', 'desc');
    }
}
