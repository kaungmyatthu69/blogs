@props(['comments','blog'])

<div class=" container">
        <div class=" col-md-8 mx-auto">
            {{-- comment form --}}
            @auth
            
            <x-comment-form :blog="$blog" />
            @else
            <p class=" text-center">Please <a href="/login">login</a> first to comment in this blog</p>
            @endauth
            <h5 class=" my-3 text-secondary">Comments ({{$comments->count()}})</h5>


            {{-- single comment card --}}
            @foreach ($comments as $comment )

            <x-single-comment :comment="$comment"/>
            @endforeach
            {{$comments->links()}}

        </div>

    </div>
