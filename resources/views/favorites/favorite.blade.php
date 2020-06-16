
    @if(Auth::user()->is_favoriting($twitter->id))
        {!! Form::open(['route'=>['user.unfavorite',$twitter->id],'method'=>'delete']) !!}
            {!! Form::submit('Unfavorite') !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route'=>['user.favorite',$twitter->id]]) !!}
            {!! Form::submit('Favorite') !!}
        {!! Form::close() !!}
    @endif
