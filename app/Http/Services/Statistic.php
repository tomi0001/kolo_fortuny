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
        $statis->saveStatistic($title,$request->server('REMOTE_ADDR'),$request->server('HTTP_USER_AGENT'),$request->server('HTTP_REFERER'));
        
    }

    public function loadStatistic(string $type,Request $request) {
        switch($request->get("searchType")) {
            case 'http_user_agent':
                $statistic =  modelsStatistic::loadStatisticUserAgent($type,$request->get("search"));
                break;
            case 'http referer':
                $statistic =  modelsStatistic::loadStatisticHttpReferer($type,$request->get("search"));
                break;
            case 'ip':
                $statistic =  modelsStatistic::loadStatisticIp($type,$request->get("search"));
                break;
            case 'what_work':
                $statistic =  modelsStatistic::loadStatisticTitle($type,$request->get("search"));
                break;
            case 'date':
                $statistic =  modelsStatistic::loadStatisticDate($type,$request->get("search"));
                break;
            default:
                $statistic =  modelsStatistic::loadStatistic($type);
                break;
        }
       
       return $statistic;
        
    }
}
