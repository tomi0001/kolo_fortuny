<?php



namespace App\Http\Controllers;



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\Statistic;
use App\Http\Services\Root;
use App\Http\Services\Word;
use Illuminate\Http\Request;
class AdminController extends BaseController {
    

    use AuthorizesRequests, ValidatesRequests;
    
    public function main() {
        return View("layouts.app");
    }
    public function changePassword(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"zmiana hasła");
        return View("root.changePassword");
        
    }
    public function changePasswordSubmit(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"próba zmiany hasła");
        $Root = new Root;
        $Root->checkPassword($request->get("oldPassword"),$request->get("newPassword"),$request->get("newPasswordConfirm"));
        if (count($Root->error) > 0) {
            return View("root.changePassword")->with("error",$Root->error);
        }
        else {
            $Root->updatePassword($request->get("newPassword"));
            return View("root.changePassword")->with("succes","poprawnie zmodyfikowano hasło");
        }
        
    }
    public function statistik(Request $request,$type = "created_at") {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"statyski przeglądanie");
        $statistic = $Statistic->loadStatistic($type);
        return View("root.loadStatistic")->with("statistic",$statistic);
    }
    public function addTtile(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request,"strona dodawanie hasła");
        $Word = new Word;
        $list = $Word->selectCategory();
        return View("root.addTitle")->with("listWord",$list);
        
    }
    public function addTitleSubmit(Request $request) {
        
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request," dodawanie hasła");
        $Word = new Word;
        $Word->checkError($request);
        //$list = $Word->selectCategory();
        if (count($Word->error) > 0) {
            return View("ajax.error")->with("error",$Word->error);
        }
        else {
            $Word->addWord($request->get("nameWord"),$request->get("punkt"));
            return View("ajax.succes")->with("succes","pomyślnie dodano");
        }
    }
    public function showCategories(Request $request,$type = "created_at") {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request," Wyświetlanie kategorii");
        $Word = new Word;
        $list = $Word->selectShowCategories($type);
        return View("root.showCategories")->with("listCategories",$list);
    }
    public function updateCategories(Request $request) {
        $Statistic = new Statistic;
        $Statistic->saveStatistic($request," Edycja kategpori " . $request->get("id"));
        $Word = new Word;
        $Word->updateCategories($request);
        return View("ajax.updateCategory");
    }
}
