<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Word extends Model
{
    use HasFactory;
    public static function selectCategory() {
        return self::select(DB::raw("MAX(id) as id"))->selectRaw("category as category")->groupBy("category")->inRandomOrder()->get();
    }
    public static function selectNameCategory(int $id) {
        return self::selectRaw("category as category")->where("id",$id)->first();
    }
    public static function selectWord() {
        return self::select(DB::raw("name as name"))->selectRaw("category as category")->selectRaw("punkt as punkt")->inRandomOrder()->first();
    }
    public static function selectWordId(string $name) {
        return self::select(DB::raw("name as name"))->selectRaw("category as category")->selectRaw("punkt as punkt")->where("category",$name)->inRandomOrder()->first();
    }
    public  function addWord(string $name, string $category,int $punkt) :void  {
        $word = new self;
        $word->name = $name;
        $word->category = $category;
        $word->punkt = $punkt;
        $word->save();
    }
}
