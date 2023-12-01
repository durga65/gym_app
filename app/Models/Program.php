<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class Program extends Model
{
    use HasFactory;
    protected $table = "gym_programs";

    protected $fillable = [
        'name', 'description','progress',
    ];

    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    
    
    
}
