<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Product extends Model
{
    // use HasFactory;
    // use ModelTree;

    use DefaultDatetimeFormat;
    //table name
    protected $table = 'products';
    
    public function ProductType(){
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }
    public function getRecommended(){
        return $this->where(['is_recommend'=>1])->orderBy('id', 'DESC')->limit(3)->get();
    }
    public function getAdbanner(){
        return $this->where(['type_id'=>2])->orderBy('id', 'DESC')->limit(3)->get();
    }
   

    public function getRecent(){
        return $this->limit(5)->orderBy('id', 'DESC')->get();
    }
}
