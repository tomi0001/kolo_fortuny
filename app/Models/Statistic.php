<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = "statistic";
    public  function saveStatistic(string $title,string $ip,string|null $http_user) :void  {
        $statis = new self;
        $statis->title = $title;
        $statis->http_user_agent = $http_user;
        $statis->ip = $ip;
        $statis->save();
    }
    public static function loadStatistic(string|null $type)  {
        return self::orderBy($type,"DESC")->paginate(15);
    }
}
