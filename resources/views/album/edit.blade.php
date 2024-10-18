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
    <form class="row container" action="{{route('musician.update',$musician)}}" method="post">
      @csrf
      @method('put')
        <div class="mb-3 col-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" value="{{$musician->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('name')
            <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputPassword1" class="form-label">city</label>
          <input type="text" name="city" value="{{$musician->city}}" class="form-control" id="exampleInputPassword1">
          @error('city')
            <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputEmail1" class="form-label">street</label>
          <input type="text" class="form-control" name="street" value="{{$musician->street}}" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('street')
            <p class="bg-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputPassword1" class="form-label">phone</label>
          <input type="text" value="{{$musician->phone}}" name="phone" class="form-control" id="exampleInputPassword1">
          @error('phone')
          <p class="bg-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputEmail1" class="form-label">date_of_birth</label>
          <input type="date" class="form-control" value="{{$musician->date_of_birth}}" name="date_of_birth" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('date_of_birth')
          <p class="bg-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="mb-3 col-3">
          <label for="exampleInputPassword1" class="form-label">gender</label>
          <select class="form-select" name="gender" aria-label="Default select example">
            <option value="" selected>select gender</option>
            <option value="male" {{$musician->gender == 'male' ? 'selected' : ''}}>male</option>
            <option value="female" {{$musician->gender == 'female' ? 'selected' : ''}}>female</option>
          </select>
          @error('gender')
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