@props(['blog', 'randomblogs'])

<x-layout>
    <x-slot name="title">Create coder</x-slot>

    <!-- single blog section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">

      <img src="/storage/{{$blog->thumbnails}}"
                    class="card-img-top " alt="..." width="200px" height="350px" />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div>
                    <div>Author -<a href="/?author={{ $blog->author->username }}">{{ $blog->author->name }}</a></div>
                    <div class=" text-secondary">Published at -{{ $blog->created_at->diffForHumans() }}</div>
                    <a href="/?category={{ $blog->category->slug }}">
                        <div class=" badge bg-primary">{{ $blog->category->name }}</div>
                    </a>

                    <div class=" my-3">


                        <form action="/blogs/{{$blog->slug}}/subscription" method="post">
                            @csrf
                            @auth
                            @if ( auth()->user()->isSubscribed($blog))
                            <button class=" btn btn-danger">Unsubscribe</button>
                            @else
                            <button class=" btn btn-warning">Subscribe</button>
                            @endif
                            @endauth
                        </form>

                    </div>

                </div>
                <p class="lh-md">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>
    </div>
    {{-- comments section --}}
   <x-comments-section  :comments="$blog->comments()->latest()->paginate(3)" :blog="$blog"/>
    <!-- subscribe new blogs -->


    <x-blog-you-may-like :randomblogs='$randomblogs' />
    <!-- footer -->
</x-layout>
