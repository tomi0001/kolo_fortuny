@extends('root.main')
@section('content')

<div id='main'>
    @include ('root.menu')
</div>

<div class='loadStatistic'>
    <div class="search-statistic">
        WYSZUKAJ
        <form action="{{route('admin.statistik')}}" method="get">
            <input type="text" class="form-control" name="search" placeholder="fraza">
            <select class="form-control" name="searchType">
                <option value="http_user_agent">http user agent</option>
                <option value="http referer">http referer</option>
                <option value="ip">ip</option>
                <option value="what_work">co robił</option>
                <option value="date">data</option>
            </select>
            <input type="submit" value="WYSZUKAJ" class="btn btn-primary">
        </form>
    </div>
    <table class='table' style="table-layout: fixed;">
           <tr class='statistic'>
               <td style='width: 6%;'>
                   id
               </td>
               <td  style='width: 30%;'>
                   <a href='{{ route('admin.statistik')}}/http_user_agent'>http user agent</a>
               </td>
               <td  style='width: 30%; '>
                   <a href='{{ route('admin.statistik')}}/http_referer'>http referer</a>
               </td>
               <td  style='width: 10%;'>
                   <a href='{{ route('admin.statistik')}}/ip'>ip</a>
                   
               </td>
               <td  style='width: 10%;'>
                   <a href='{{ route('admin.statistik')}}/title'>co robił</a>
                   
               </td>
               <td  style='width: 10%;'>
                   <a href='{{ route('admin.statistik')}}'>data</a>
                   
               </td>
           </tr>
           @foreach ($statistic as $sta)
           <tr class='statistic'>
               <td>
                   {{$sta->id}}
               </td>
               <td>
                   {{$sta->http_user_agent}}
               </td>
               <td style="word-wrap: break-word;">
                   {{$sta->http_referer}}
               </td>
               <td>
                   {{$sta->ip}}
               </td>
               <td>
                   {{$sta->title}}
               </td>
               <td>
                   {{$sta->created_at}}
               </td>
           </tr>
                
           @endforeach
           <tr>
               
      
               <td colspan="5">
                   {{$statistic->appends(['searchType'=>Request::get('searchType')])->appends(['search'=>Request::get('search')])->links('pagination::bootstrap-5')}}
               </td>
               
           </tr>
    </table>
</div>

@endsection