<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\Statistic;
use App\Http\Services\Word;
use Illuminate\Http\Request;
class MainController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function main(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"strona główna");
        $Word = new Word;
        $category = $Word->selectCategory();
        return View("main.index")->with("category",$category);
    }
    public function loadPage2(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"Hasło nr 1");
        $Word = new Word;
        $wordl = $Word->selectWordl($request->get("id"));
        //print $request->get("id");
        return View("ajax.loadPage2")->with("wordl",$wordl)->with("bool",$request->get("bool"))
                ->with("punktsAt",0)->with("allCategories",$request->get("allCategories"))->with("nameCategory",$Word->nameCategory);
    }
    public function loadPageNext(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"Hasło nr " . $request->get("licznik"));
        $Word = new Word;
        $category = $Word->selectCategory();
        return View("ajax.indexNextGame")->with("category",$category)->with("punktsAt",$request->get("punkts"))->with("bool",$request->get("bool"));
    }
}
