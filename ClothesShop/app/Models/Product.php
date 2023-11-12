<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'thumb',
    ];
    public function menu(){ // thể hiện mối quan hệ một nhiều với một Menu
        return $this->belongsTo(Menu::class, 'menu_id','id');
        // với id là khóa chính , menu_id là khóa phụ trong lập trình
    }

}
