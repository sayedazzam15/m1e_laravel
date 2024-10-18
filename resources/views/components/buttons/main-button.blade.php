<div>
    @if($type == 'button')
        <button id="{{$id}}">{{$slot}}</button>
    @else
        <a href="{{$href}}" id="{{$id}}">{{$slot}}</a>
    @endif
</div>