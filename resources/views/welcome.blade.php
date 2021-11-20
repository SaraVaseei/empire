<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Empire</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;
            font-family: Nunito;
            border-radius: 25px;
            padding: 25px;
            border: 1px solid grey;
            width: fit-content;
            margin: 20px auto;
        }

        ul {
            list-style-type: none;
        }

        li, label {
            font-size: 20px;
            display: block;
        }

        input {
            padding: 6px 10px;
            margin: 5px;
        }

        button {
            font-size: 15px;
            background-color: #1c7430;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body class="antialiased">
<form method="post" action="{{url('troop-generator')}}">
    @csrf
    <div>
        <label for="max">Maximum number of warriors in army:</label>
        <input type="number" name="max" required/>
    </div>
    <div><label for="units">Number of units:</label>
        <input type="number" name="units" required/></div>
    <button type="submit">submit</button>
</form>
<ul>
    @if(isset($addends) && sizeof($addends))

        @foreach($addends as $key => $value)
            <li>{{$titles[$key]}}: {{$value}}</li>
        @endforeach
        
    @elseif(isset($error))
        <h4 style="color: red">{{$error}}</h4>
    @endif
</ul>

<h3>time: {{$period}} milliseconds</h3>
</body>
</html>
