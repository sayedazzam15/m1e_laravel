<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .bg-gray{
            background: gray;
        }
    </style>
</head>
<body>
    <a class="btn btn-primary" href="{{route('album.create')}}">create album</a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>cpr_date</th>
                <th>producer name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($albums as $album)
                <tr>
                    <td>{{ $album->id }}</td>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->cpr_date }}</td>
                    <td>{{ $album->musician->name }}</td>
                    <td>{{ $album->created_at }}</td>
                    <td>
                        <a href="{{route('album.show',$album)}}" class="btn btn-primary">show</a>
                        {{-- <form action="{{route('musician.destroy',$musician)}}" method="post">
                            @csrf 
                            @method('delete')
                            <button>delete</button>
                        </form> --}}
                    </td>
                </tr>
            @empty
             <tr> <td><h3>no content</h3></td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- {{$musicians->links('pagination',['page_count' => $musicians->count()])}} --}}
    {{$albums->links()}}
    
</body>
</html>