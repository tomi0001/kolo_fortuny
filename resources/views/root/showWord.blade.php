@extends('root.main')
@section('content')

<div id='main'>
    @include ('root.menu')
</div>
@include ('include.url')
<div class='loadStatistic'>
    <table class='table' style="table-layout: fixed;">
           <tr class='statistic'>
               <td style='width: 6%;'>
                   id
               </td>
               <td  style='width: 50%;'>
                   <a href='{{ route('admin.showWord')}}/words.name'>nazwa</a>
               </td>
               <td  style='width: 30%; '>
                   <a href='{{ route('admin.showWord')}}/categories.punkt'>punkty</a>
               </td>
               <td>
                   
               </td>

           </tr>
           @foreach ($listWord as $list)
           <tr id='word_{{$list->id}}'>
               <td>
                   {{$list->id}}
               </td>
               <td class="name_{{$list->id}}">
                   {{$list->name}}
               </td>
               <td  class="punkt_{{$list->id}}">
                   {{$list->punkt}}
               </td>
               <td>
                   <a onclick="editWord({{$list->id}})" class="links linkss_{{$list->id}}" >EDYTUJ</a>
               </td>

           </tr>
                
           @endforeach
           <tr>
               <td colspan="5">
                   {{$listWord->links('pagination::bootstrap-5')}}
               </td>
               
           </tr>
    </table>
</div>

@endsection