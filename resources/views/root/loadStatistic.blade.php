@extends('root.main')
@section('content')

<div id='main'>
    @include ('root.menu')
</div>

<div class='loadStatistic'>
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
                   {{$statistic->links('pagination::bootstrap-5')}}
               </td>
               
           </tr>
    </table>
</div>

@endsection