@extends('main-layout')
    @section('title', 'musician page')
    @section('sidebar')
    @parent
        this is musician sidebar
    @endsection

   @section('content')
        <a class="btn btn-primary" href="{{route('musician.create')}}">create musician</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>city</th>
                    <th>street</th>
                    <th>phone</th>
                    <th>gender</th>
                    <th>top_producer</th>
                    <th>date_of_birth</th>
                    <th>created_at</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($musicians as $musician)
                    <tr>
                        <td>{{ $musician->id }}</td>
                        <td>{{ $musician->name }}</td>
                        <td>{{ $musician->slug }}</td>
                        <td>{{ $musician->city }}</td>
                        <td>{{ $musician->street }}</td>
                        <td>{{ $musician->phone }}</td>
                        <td>{{ $musician->gender }}</td>
                        <td>{{ $musician->top_producer }}</td>
                        <td>{{ $musician->date_of_birth }}</td>
                        <td>{{ $musician->created_at }}</td>
                        <td>
                                <a href="{{route('musician.show',$musician)}}" class="btn btn-primary">Show</a>
                                {{-- <a href="{{route('musician.edit',$musician)}}">edit</a> --}}
                                <x-buttons.main-button  :href="route('musician.edit',$musician)" type="link" :id="$musician->id">edit</x-buttons.main-button>
                                {{-- @can('musician.delete') --}}
                                    <form action="{{route('musician.destroy',$musician)}}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <x-buttons.main-button>delete</x-buttons.main-button>
                                    </form> 
                                {{-- @endcan --}}
                        </td>
                    </tr>
                @empty
                    <tr> <td><h3>no content</h3></td></tr>
                @endforelse
            </tbody>
        </table>
        {{$musicians->links()}}

   @endsection


   @push('js')
    <script>
        alert(message)
    </script>
   @endpush