<ul class="list-unstyled">
    @foreach($twitter as $tweet)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{Gravatar::src($tweet->user->email,50)}}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show',$tweet->user->name,['id'=>$tweet->user->id]) !!}<span class="text-muted">posted at{{$tweet->created_at}}</span>
                </div>
                <div>
                    <p class="mb-0">{!! n12br(e($tweet->content)) !!}</p>
                </div>
                <diV>
                    @if(Auth::id()==$tweet->user_id)
                        {!! Form::open(['route'=>'twitter.destroy',$tweet->id],'method'=>'delete']) !!}
                            {!! Form ::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </diV>
            </div>
        </li> 
    @endforeach
</ul>
{{ $twitter->links('pagination::bootstrap-4') }}