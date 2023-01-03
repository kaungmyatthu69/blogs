@props(['blog'])

<x-admin-layout>
    <x-slot name='title'>edit blogs</x-slot>
    <h3 class="text-center mt-3"> Blog Edit Form</h3>
    <div class="  mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/{{$blog->slug}}/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="title"  :value="$blog->title"/>
                <x-form.input name="slug" :value="$blog->slug" />
                <x-form.input name="intro" :value="$blog->intro" />
                 <x-form.textarea name="body" :value="$blog->body"/>
                 <x-form.input name='image' type="file"  />
                 <img src="/storage/{{$blog->thumbnails}}" width="100px" height="150px" alt="">

                 <x-form.input-wrapper>
                    <x-form.input-label name="Category"/>
                    <select  class=" form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)

                         <option value="{{$category->id}}"{{$category->id==old("category_id",$blog->category->id)?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                        <x-error name='category_id'/>


                </x-form.input-wrapper>

                  <div class=" mt-3 d-flex justify-content-end"><button type="submit" class=" btn btn-primary">Submit</button></div>
            </form>
        </x-card-wrapper>

    </div>
</x-admin-layout>
