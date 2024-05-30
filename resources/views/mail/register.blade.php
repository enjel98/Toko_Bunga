<h3>Hallo {{$user->name}}</h3>
Pendaftara sudah diterima, silahkan klik link berikut untuk aktivasi akun anda
<p>
    <a href="{{url("/register/activation/$user->token_activation")}}">klik disini</a>
</p>
