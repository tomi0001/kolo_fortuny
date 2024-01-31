@extends('main.main')
@section('content')
    <div id='menu'>
        @include ('main.menu')
    </div>
    <div id='page' class="page-desciption">
        <div class="description">
            Zasady gry sa podobne jak w kole fortuny, gra polega na tym, że wybieramy kategorie dla , której są przyporządkowane liczba okreslonych 
            punktów możemy też wybrac losowanie z wszystkich kategorii wtedy mamy trudniej, ale możemy zdobyć większą liczbę punktów i jak 
            klikniemy na poszczególną kategorię to na samym początku mamy 1000 ptk i widzimy z ile liter składa się słowo lub zdanie,
            które mamy odgadnąc i widzimy też spacje w danym słowie zdaniu możemy klikać w hiperłącza zgaduje spółgłoskę, 
            samogłoskę  lub tez możemy zgadywac cyfry jak dana literaz bądź cyfra będzie w naszym słowie to się ujawni jej
            pozycja w słowie i się ona nam ukaże natomiast jak nie będzie danej litery bądź cyfry to się nic nie stanie punkty
            sa na bieżąco odejmowane od naszych zdobytych punktów, ponieważ kupuje litery bądź cyfry i teraz możemy ogdadnąć
            hasło przez kupienie wszystkich liter które są w danym haśle bądź jak jesteśmy pewni jakie to hasło możemy użyć
            przycisku zgaduję hasło i wpisać hasło nie możemy zrobić żadnego błędu jak wpisuje hasło. Możemy też zryzygnować
            z gry klikając przycisk rezygnuj z gry i wygramy tyle punktów ile posiadamy. W grze jest jeszcze tak jak w milionerach
            gwarantowane punkty chodzi o to, że od zdobycia iluś tam punktów mamy gwarantowanę liczbę punktów jest to korzystne w 
            tym przypadku kiedy źle zgadneliśmy hasło, ale mieliśmy już gwarantowaną liczbę punktów i wtedy wygrywamy ta gwarantowaną liczbę punktów.
            <br><br>
            <span class="description">Koniec gadania miłej gry</span>
        </div>
        <a href="{{route('main')}}" style="text-decoration: none;"><div class='link-menu-main'>MENU GŁÓWNE</div></a>
    </div>
    
@endsection