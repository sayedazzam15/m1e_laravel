<x-main-layout>
    <x-slot:title>
        song page
    </x-slot>
    <a class="btn btn-primary" href="{{route('song.create')}}">create song</a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>album title</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($songs as $song)
                <tr>
                    {{-- 10 songs --}}
                    {{-- loop --}}
                    {{-- query album --}}
                    {{-- lazy loading --}}
                    {{-- eager loading --}}
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->author }}</td>
                    <td>{{ $song->album->title ?? 'no album' }}</td>
                    <td>{{ $song->created_at }}</td>
                    {{-- <td>
                        <a href="{{route('musician.edit',$musician)}}">edit</a>
                        <form action="{{route('musician.destroy',$musician)}}" method="post">
                            @csrf 
                            @method('delete')
                            <button>delete</button>
                        </form>
                    </td> --}}
                </tr>
            @empty
             <tr> <td><h3>no content</h3></td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- {{$musicians->links('pagination',['page_count' => $musicians->count()])}} --}}
    {{$songs->links()}}
</x-main-layout>
