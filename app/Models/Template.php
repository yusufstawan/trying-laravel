<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'template',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function templatesBuilds()
    {
        return $this->hasMany(TemplatesBuild::class);
    }
}
