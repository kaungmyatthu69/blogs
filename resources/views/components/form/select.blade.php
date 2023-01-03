@props(['name','categories','blog'])

<x-form.input-wrapper>
    <x-form.input-label :name="$name"/>
    <select  class=" form-control" name="category_id" id="category_id">
        @foreach ($categories as $category)

         <option value="{{$category->id}}"{{$category->id==old("category_id")?'selected':''}}>{{$category->name}}</option>
        @endforeach
    </select>
        <x-error name='category_id'/>


</x-form.input-wrapper>
