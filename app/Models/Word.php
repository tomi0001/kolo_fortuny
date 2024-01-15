<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
class Word extends Model
{
    use HasFactory;
    
    public static function selectWord() {
        return self::join("categories","categories.id","words.categoryId")->select(DB::raw("words.name as name"))->selectRaw("words.categoryId as categoryId")->selectRaw("20000 as punkt")->inRandomOrder()->first();
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
    public static function showAllWord(string|null $type) {
        return self::join("categories","categories.id","words.categoryId")->selectRaw("words.name as name")->selectRaw("categories.name as categories")
                ->selectRaw("categories.punkt as punkt")->selectRaw("words.id as id")->orderBy("$type","DESC")->paginate(30);
    }
    public function updateWord(Request $request) {
        return self::where("id",$request->get("id"))->update(["name" => $request->get("name")]);
    }
}
