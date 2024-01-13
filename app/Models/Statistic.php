<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = "statistic";
    public  function saveStatistic(string $title,string $ip,string|null $http_user,string|null $http_referer) :void  {
        $statis = new self;
        $statis->title = $title;
        $statis->http_user_agent = $http_user;
        $statis->ip = $ip;
        $statis->http_referer = $http_referer;
        $statis->save();
    }

    public static function loadStatistic(string|null $type)  {
        return self::orderBy($type,"DESC")->paginate(15);
    }
    public static function loadStatisticUserAgent(string|null $type,string|null $search) {
        return self::where("http_user_agent","like","%{$search}%")->orderBy($type,"DESC")->paginate(15);
    }
    public static function loadStatisticHttpReferer(string|null $type,string|null $search) {
        return self::where("http_referer","like","%{$search}%")->orderBy($type,"DESC")->paginate(15);
    }
    public static function loadStatisticIp(string|null $type,string|null $search) {
        return self::where("ip","like","%{$search}%")->orderBy($type,"DESC")->paginate(15);
    }
    public static function loadStatisticTitle(string|null $type,string|null $search) {
        return self::where("title","like","%{$search}%")->orderBy($type,"DESC")->paginate(15);
    }
    public static function loadStatisticDate(string|null $type,string|null $search) {
        return self::where("created_at","like","%{$search}%")->orderBy($type,"DESC")->paginate(15);
    }
}
