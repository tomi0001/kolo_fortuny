@extends('root.main')
@section('content')

<body>
<div id='main'>
    @include ('root.menu')
</div>

<div class='changePassword'>
    <table class='table changePassword'>
        <form action='{{route('admin.changePasswordSubmit')}}' method='post'>
            <tr>
                <td>Wpisz stare hasło</td>
                <td><input type='password' class='form-control' placeholder="stare hasło" name='oldPassword'></td>
            </tr>
            <tr>
                <td>Wpisz nowe hasło</td>
                <td><input type='password' class='form-control' placeholder="nowe hasło" name='newPassword'></td>
            </tr>
            <tr>
                <td>Wpisz jeszcze raz nowe hasło</td>
                <td><input type='password' class='form-control' placeholder="nowe hasło" name='newPasswordConfirm'></td>
            </tr>
            <tr>
                
                <td colspan="2" class='center'><input type='submit' class='btn btn-primary btn-lg' value='ZMIEŃ HASŁO' ></td>
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
    
</body>

@endsection