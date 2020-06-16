<ul class="list-unstyled">
    @foreach($twitter as $tweet)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{Gravatar::src($tweet->user->email,50)}}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show',$tweet->user->name,['id'=>$tweet->user->id]) !!}<span class="text-muted">posted at{{$tweet->created_at}}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($tweet->content)) !!}</p>
                </div>
                 <div>
                     
                    @if(Auth::user()->is_favoriting($tweet->id))
                        {!! Form::open(['route'=>['favorites.unfavorite',$tweet->id],'method'=>'delete']) !!}
                            {!! Form::submit('Unfavorite') !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route'=>['favorites.favorite',$tweet->id]]) !!}
                            {!! Form::submit('Favorite') !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div>
                    @if(Auth::id()==$tweet->user_id)
                        {!! Form::open(['route'=>['twitter.destroy',$tweet->id],'method'=>'delete']) !!}
                            {!! Form ::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li> 
    @endforeach
</ul>
{{ $twitter->links('pagination::bootstrap-4') }}