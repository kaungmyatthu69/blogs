@props(['comment'])

<x-card-wrapper>

    <div class=" d-flex">
        <div>
            <img src="{{$comment->author->avator}}" width="50" height="50" class=" rounded-circle"
                alt="">
        </div>
        <div class=" ms-3">
            <h5>{{$comment->author->name}}</h5>
            <p class=" text-secondary">{{$comment->created_at->diffForHumans()}} </p>
        </div>

    </div>
    <div>
        <p>{{$comment->body}}</p>
    </div>
</x-card-wrapper>
