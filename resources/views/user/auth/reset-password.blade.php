<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <style>
        * {
            margin: 0%;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            background: #edebf0;
        }

        form {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: flex-start;
        }

        label {
            text-align: left;
            font-weight: 700;
            margin-left: 5px;
        }

        input {
            margin-bottom: 10px;
            width: 300px;
            display: block;
            font-size: 22px;
            padding: 4px 4px;
            border: 2px solid rgb(230, 220, 220);
            border-radius: 6px;
        }

        input:focus {
            outline: none;
        }

        button {
            width: 300px;
            padding: 7px 7px;
            font-weight: 600;
            background: green;
            border: none;
            border-radius: 6px;
            color: #edebf0;
            cursor: pointer;
        }

        button:hover {
            opacity: .7;
        }
    </style>
</head>

<body>
    <form action="{{ Route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            @error('password')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
            {{ $message }}
            @enderror
        </div>
        <div>
            <button>Update</button>
        </div>
    </form>
</body>

</html>
