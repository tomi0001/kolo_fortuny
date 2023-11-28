@include ('root.main')
<body>
    @guest
    <div id="login">
        <form action='{{route("login")}}' method='post'>
            <table>
                <tr>
                    <td style="height: 35px;">

                    </td>

                </tr>
                <tr>
                    <td  style='width: 38%;' class='center'>
                        <span class="login">TWÓJ LOGIN</span>
                    </td>
                    <td style='width: 10%;'>
                    </td>
                    <td>
                        <input class="form-control form-control-lg" name="login" placeholder="twój login" type='text'>
                    </td>
                </tr>
                <tr>
                    <td style="height: 35px;">

                    </td>

                </tr>
                <tr>
                    <td  style='width: 38%;' class='center'>
                        <span class="login">TWOJE HASŁO</span>
                    </td>
                    <td style='width: 10%;'>
                    </td>
                    <td>
                        <input class="form-control form-control-lg" name="password" placeholder="twoje hasło" type='password'>
                    </td>
                </tr>
                 <tr>
                    <td style="height: 35px;">

                    </td>

                </tr>
                <tr>
                    <td colspan="3" class='center'>
                        <input class="btn btn-primary btn-lg"  type='submit' value='Zaloguj się'>
                    </td>
                </tr>
                @if (Session::get('error') == true )
                
                    <tr>
                        <td colspan="3" class='center'>
                            <span class='error'>Błędne dane logowania</span>
                        </td>
                    </tr>
                @endif
                @csrf
                
                    
                
            </table>
        </form>
    </div>
    @else
        @include ('root.menu')
    
    @endif
</body>
</html>
