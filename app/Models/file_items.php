<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_items extends Model
{
    use HasFactory;
    protected $fillable = ['file_id', 'filename'];
    public function files()
    {
    return $this->belongsTo(files::class,'file_id','id');
    }
    
}
