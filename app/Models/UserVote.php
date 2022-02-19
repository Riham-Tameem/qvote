<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVote extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['vote_id','option_id','mac_address'];
    public function vote()
    {
        return $this->belongsTo(Vote::class,'vote_id');
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
