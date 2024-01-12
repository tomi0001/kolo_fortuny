@extends('root.main')
@section('content')

<div id='main'>
    @include ('root.menu')
</div>

<div class='addTitle'>
    <table class='table addTitle'>
        <form  method='get' id='addTitle'>
            <tr >
                <td>Nazwa hasła</td>
                <td><textarea name="nameWord" class="form-control" rows="5">{{request()->input("nameWord")}}</textarea></td>
            </tr>
            <tr>
                <td style="width: 40%;">kategoria</td>
                <td>
                    <select name="category1" class="form-control">
                        <option value=""></option>
                        @foreach ( $listWord as $array)
                        <option value="{{$array->category}}">{{$array->category}}</option>
                            
                        @endforeach
                    </select>
                
                </td>
            </tr>
            <tr>
                <td>kategoria</td>
                <td><input type='text' class='form-control' placeholder="nazwa kategorii" name='category2'></td>
            </tr>
             <tr>
                <td>ilośc punktów</td>
                <td><input type='number' class='form-control' placeholder="ilość punktów" name='punkt' min="500" value="5000"></td>
            </tr>
            <tr>
                
                <td colspan="2" class='center'><input type="button"  class='btn btn-primary btn-lg' onclick="addTitle('{{route('admin.addTitleSubmit')}}')" value="DODAJ HASŁO"></td>
            </tr>
            
        </form>
        <tr>
            <td colspan="2" class='center'>
                <div id='addTitle-div'>
               
                </div>
                
            </td>
        </tr>
    </table>
</div>
@endsection