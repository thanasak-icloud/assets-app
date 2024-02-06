<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasAsset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id', 'id');
    }

    public function assets()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
