<?php

namespace App\Http\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Statistic as modelsStatistic;
use Illuminate\Http\Request;

class Statistic {
    public function saveStatistic(Request $request,string $title ) :void {
        $statis = new modelsStatistic;
        $statis->saveStatistic($title,$request->server('REMOTE_ADDR'),$request->server('HTTP_USER_AGENT'));
        
    }
    public function loadStatistic(string $type) {
       $statistic =  modelsStatistic::loadStatistic($type);
       return $statistic;
        
    }
}
