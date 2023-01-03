@props(['blog'])
<x-admin-layout>
    <x-slot name='title'>Create Blogs</x-slot>
    <h3 class="text-center mt-3"> Blog Create Form</h3>
    <div class="  mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/create" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="intro" />
                 <x-form.textarea name="body"/>
                 <x-form.input name='image' type="file" />

                <x-form.select  :categories="$categories" name="category" />
                  <div class=" mt-3 d-flex justify-content-end"><button type="submit" class=" btn btn-primary">Submit</button></div>
            </form>
        </x-card-wrapper>

    </div>
</x-admin-layout>
