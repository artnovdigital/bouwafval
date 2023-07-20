<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    public static function boot() {
        parent::boot();

        

        static::saving(function ($model) {

            $model->logo = str_replace("\\", "/", $model->logo);
           
        });



    }


    public function recepies()
    {
        return $this->hasMany(Recipe::class);
    }

}
