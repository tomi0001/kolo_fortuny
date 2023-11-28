@extends('root.main')
@section('content')

<div id='main'>
    @include ('root.menu')
</div>

<div class='addTitle'>
    <table class='table addTitle'>
        <form action='{{route('admin.addTitleSubmit')}}' method='get'>
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
                
                <td colspan="2" class='center'><input type='submit' class='btn btn-primary btn-lg' value='DODAJ HASŁO' ></td>
            </tr>
            @csrf
        </form>
        <tr>
            <td colspan="2" class='center'>
                @if (isset($error)) 
                    @foreach($error as $errors)
                        <span class="error">{{$errors}}</span> <br>
                    @endforeach
                @endif
                @if (isset($succes)) 
                    <span class="succes">{{$succes}}</span>
                @endif
                
                
            </td>
        </tr>
    </table>
</div>
@endsection