<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>
<body>
    <form class="row container" action="{{route('album.store')}}" method="post">
      @csrf
        <div class="mb-3 col-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" class="form-control" value="{{old('title')}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('title')
            <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputPassword1" class="form-label">cpr_date</label>
          <input type="date" name="cpr_date" value="{{old('cpr_date')}}" class="form-control" id="exampleInputPassword1">
          @error('cpr_date')
            <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputPassword1" class="form-label">producer</label>
          <select class="form-select" name="musician_id" aria-label="Default select example">
            @foreach($musicians as $musician)
              <option value="{{$musician->id}}">{{$musician->name}}</option>
            @endforeach
          </select>
          @error('musician_id')
          <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="row">
          <div class="col-6"></div>
          <button type="submit" class="btn btn-primary col-1">Submit</button>
        </div>
      </form>
    
</body>
</html>