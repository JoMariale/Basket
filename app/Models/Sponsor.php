<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\sponsorController;

class sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];

    public function sponsors(){
        return $this->belongsToMany(Sponsor::class);
    }
}
