<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container py-5">
        @if ($errors->any())        
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
        <form action="{{ url('/sesi/login') }}" method="POST">
            @csrf
            <div class="align-items-center">
                <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Nama</label>
                </div>
                <div class="col-auto">
                <input type="text"  name="username" class="form-control" aria-describedby="passwordHelpInline" value="{{Session::get('username')}}">
                </div>
                <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Password</label>
                </div>
                <div class="col-auto mb-4">
                <input type="password" id="inputPassword6" name="password" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Masukan Captcha</label>
                    </div>
                <div class="col-auto mb-4">
                    {!! captcha_img('flat') !!}
                    <input type="text" id="captcha" name="captcha" >
                </div>
                <div class="col-auto">
                <button class="btn btn-primary" type="submit" name="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>