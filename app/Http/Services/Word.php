<?php

namespace App\Http\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Word as wordModels;
use App\Models\Categorie as categorieModels;
use Illuminate\Http\Request;
use Hash;
use Auth;

class Word {
    public $nameCategory  = "";
    public $error = [];
    public function selectCategory() {
        $word = categorieModels::selectCategory();
        return $word;
    }
    public function selectWordl(int $id = 0) {
        if ($id == 0) {
            $word = wordModels::selectWord();
            $this->nameCategory = null;
        }
        else {
            $this->nameCategory = categorieModels::selectNameCategory($id)->category;
            $word = wordModels::selectWordId($id);
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
        $check =  categorieModels::selectIsExistCategory($this->nameCategory);
        if ($check == null ) {
            $categorieModels = new categorieModels;
            $id = $categorieModels->addCategory($this->nameCategory,$punkt);
          
        }
        else {
            $id = $check->id;
        }
       
        $wordModels = new wordModels;
        $wordModels->addWord($name,$id);
    }
    public function selectShowCategories(string $type) {
        $listCategories = categorieModels::showAllCategories($type);
        return $listCategories;
    }
    public function updateCategories(Request $request) {
        $CategorieModels = new categorieModels;
        $CategorieModels->updateCategory($request);
    }
    public function selectShowWord(string $type) {
        $listWord = wordModels::showAllWord($type);
        return $listWord;
    }
    public function updateWord(Request $request) {
        $WordModels = new wordModels;
        $WordModels->updateWord($request);
    }
}
