<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
class Categorie extends Model
{
    use HasFactory;
    public static function selectCategory() {
        return self::select(DB::raw("MAX(id) as id"))->selectRaw("name as category")->selectRaw("punkt as punkt")->groupBy("punkt")->groupBy("name")->inRandomOrder()->get();
    }
    public static function selectNameCategory(int $id) {
        return self::selectRaw("name as category")->selectRaw("punkt as punkt")->where("id",$id)->first();
    }
    public  function addCategory(string $category,int $punkt) :int  {
        $word = new self;
        $word->name = $category;
        $word->punkt = $punkt;
        $word->save();
        return $word->id;
    }
    public function updateCategory(Request $request) {
        return self::where("id",$request->get("id"))->update(["name" => $request->get("name"), "punkt" => $request->get("punkt")]);
    }
    public static function showAllCategories(string|null $type) {
        return self::selectRaw("name as category")->selectRaw("punkt as punkt")->selectRaw("id as id")->orderBy($type,"DESC")->paginate(30);
    }
    public static function selectIsExistCategory(string $name) {
        return self::selectRaw("id as id")->where("name",$name)->first();
    }
}
