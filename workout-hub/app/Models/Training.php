<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'category_id'
    ];

    public function getItem($id)
    {
        return $this->find($id);
    }

    public function saveTraining($params)
    {
        $new = $this->create($params);

        return $new;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
