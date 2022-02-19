<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','company','start_at','end_at','type','is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function userVotes()
    {
        return $this->hasMany(UserVote::class);
    }

}
