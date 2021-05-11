<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>

        @error('*')
        <div style="color:red;">
            {{ $message }}
        </div>
        @enderror

        @if (session()->has('status'))
        <div style="color:red;">
            {{ session('status') }}
        </div>
        @endif
    </form>

    <ul>
        <li><a href="{{ route('register') }}">Register</a></li>
        <li><a href="{{ route('home') }}">Home</a></li>
    </ul>
</body>

</html>