<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>

    <form action="{{ route('register') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>username</td>
                <td>:</td>
                <td>
                    <input type="text" name="username" id="username">
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
                <td>password confirm</td>
                <td>:</td>
                <td>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Register</button>
                </td>
            </tr>
        </table>

        @error('*')
            <div style="color:red;">
                {{ $message }}
            </div>
        @enderror
    </form>

    <ul>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('home') }}">Home</a></li>
    </ul>
</body>
</html>