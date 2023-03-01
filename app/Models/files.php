<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;
    protected $fillable = ['status_upload','user_id'];
    public function file_items()
    {
    return $this->hasMany(file_items::class,'file_id','id');
    }
     
}
