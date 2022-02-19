<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['vote_id','image','text'];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
    public function userVotes()
    {
        return $this->hasMany(UserVote::class);
    }
    public function getImageAttribute($value)
    {
        if (isset($value))
            return url('storage/'.$value);
    }
}
