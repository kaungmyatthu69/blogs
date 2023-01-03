@props(['blog'])
<x-card-wrapper >

   <form action="/blogs/{{$blog->slug}}/commments" method="post">

       @csrf
       <div class="mb-3">
         <textarea name="body" id="" cols="10" class=" form-control" rows="7"></textarea>
       </div>
       <x-error name='body'/>

       <div class=" d-flex justify-content-end">
           <button type="submit" class="btn btn-primary">Submit</button>
       </div>
   </form>
   
</x-card-wrapper>
