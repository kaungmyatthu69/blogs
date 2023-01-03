@props(['blogs'])

<x-admin-layout>
@if (session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>

@endif
    <x-slot name="title">Blogs</x-slot>

<h3 class=" text-center">Blogs</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Intro</th>
        <th scope="col" colspan="2" >Action</th>
      </tr>
    </thead>
    <tbody>
@foreach ($blogs as $blog)
<tr>
    <td><a href="/blogs/{{$blog->slug}}" target="_blank" >{{$blog->title}}</a></td>
    <td>{{$blog->slug}}</td>
    <td>{{$blog->intro}}</td>
    <td>
        <a href="/admin/blogs/{{$blog->slug}}/edit" class=" btn btn-warning">
            Edit
        </a>

    </td>
    <td>
        <form action="/admin/blogs/{{$blog->slug}}/delete" method="post">
            @csrf
            @method('DELETE')

            <button class=" btn btn-danger">
                Delete
            </button>
        </form>

    </td>

</tr>
@endforeach
</tbody>
</table>
{{$blogs->links()}}
</x-admin-layout>
