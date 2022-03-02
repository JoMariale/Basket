<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\clubController;

class club extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];

    public function sponsors(){
        return $this->belongsToMany(Sponsor::class);
    }
}
