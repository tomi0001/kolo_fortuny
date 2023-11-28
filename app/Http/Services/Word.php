<?php

namespace App\Http\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Word as wordModels;
use Illuminate\Http\Request;
use Hash;
use Auth;

class Word {
    public $nameCategory  = "";
    public $error = [];
    public function selectCategory() {
        $word = wordModels::selectCategory();
        return $word;
    }
    public function selectWordl(int $id = 0) {
        if ($id == 0) {
            $word = wordModels::selectWord();
        }
        else {
            $category = wordModels::selectNameCategory($id);
            $word = wordModels::selectWordId($category->category);
        }
        
        return $word;
    }
    public function checkError(Request $request) {
        if ($request->get("nameWord") == "") {
            array_push($this->error,"Uzupełnij pole nazwa hasła");
        }
        if ($request->get("category1") == "" and $request->get("category2") == "") {
            array_push($this->error,"Uzupełnij pole nazwa kategorii");
        }
        else if ($request->get("category1") != "" ) {
           $this->nameCategory = $request->get("category1");
        }
        else {
           $this->nameCategory = $request->get("category2");
        }
    }
    public function addWord(string $name,int $punkt) {
        $wordModels = new wordModels;
        $wordModels->addWord($name,$this->nameCategory,$punkt);
    }
}
