<?php

namespace App\Http\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Statistic as modelsStatistic;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class Root {
    public array $error = [];
    public function checkPassword(string|null $password,string|null $newPassword,string|null $newPasswordConfirm) :void {
        if (!Hash::check($password,Auth::User()->password)) {
            array_push($this->error,"Stare hasło jest błędne");
        }
        if ($newPassword != $newPasswordConfirm) {
            array_push($this->error,"podane hasła różnią się");
        }
        if (strlen($newPassword)  < 4) {
            array_push($this->error,"Hasło jest za krótkie");
        }
       
    }
    public function updatePassword($passwordNew) :void {
        User::updatePassword($passwordNew);
    }
}
