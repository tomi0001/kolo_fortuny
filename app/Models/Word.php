<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Word extends Model
{
    use HasFactory;
    
    public static function selectWord() {
        return self::select(DB::raw("name as name"))->selectRaw("category as category")->selectRaw("20000 as punkt")->inRandomOrder()->first();
    }
    public static function selectWordId(int $id) {
        return self::join("categories","categories.id","words.categoryId")->select(DB::raw("words.name as name"))->selectRaw("words.categoryId as categoryId")->selectRaw("categories.punkt as punkt")->where("words.categoryId",$id)->inRandomOrder()->first();
    }
    public  function addWord(string $name, int $category) :void  {
        $word = new self;
        $word->name = $name;
        $word->categoryId = $category;
        $word->save();
    }
}
