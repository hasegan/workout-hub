<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function saveCategory($params)
    {
        $new = $this->create($params);

        return $new;
    }

    public function getItem($id)
    {
        return $this->find($id);
    }

    public function getItemByName($item)
    {
        return $this->where('name', $item)->first();
    }

    public function trainings()
    {
        return $this->hasMany('Training');
    }
}
