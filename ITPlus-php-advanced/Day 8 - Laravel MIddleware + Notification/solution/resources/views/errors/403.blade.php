<p>Forbidden.</p>

<a onclick="document.getElementById('form-logout').submit()">Logout</a>

<form action="{{ url('/logout') }}" method="POST" id="form-logout">
    @csrf
</form>
