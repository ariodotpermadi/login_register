<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>    
    <div class="container py-5">
       
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2><strong>Daftar User</strong></h2>
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm">Keluar</a>         
        </div>
        <div>
            <a href="user/create" class="btn btn-primary btn-sm">Tambah User</a>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Ctime</th>
                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = ($data->currentPage() - 1) * $data->perPage() + 1 @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->password}}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                        <td><a href="{{ url('user/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>                     
                            | 
                            <form class="d-inline" action="{{ url('user/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>