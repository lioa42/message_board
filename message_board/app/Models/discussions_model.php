<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discussions_model extends Model
{
    protected $table = 'discussions';  // 資料表名稱
    protected $primaryKey = 'id';   // 主鍵
    public $timestamps = false;
    protected $fillable =   
       ['id','site_key','nickname','content','created_at'];
}
