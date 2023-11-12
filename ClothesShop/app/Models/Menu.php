<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = 'menus';
    // protected $primaryKey = 'id'; // để lưu trường khóa chính
    // // public $timestamps = true;
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'thumb',
        'active',
    ]; // dùng để lưu các trường data mà chúng ta cần làm việc. cụ thể là một bảng trong sql được cho vào protected
    public function product(){
        return $this->hasMany(Product::class,'menu_id','id');
    }
}
