@props(['blogs'])

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    {{-- <div class="">
      <select name="" id="" class="p-1 rounded-pill">
        <option value="">Filter by Category</option>
      </select>
      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
    {{-- </div> --}}

    <x-category-dropdown/>

    <form action="" class="my-3" method="GET">
        <div class="input-group mb-3">
            @if (request('category'))

            <input
              name="category"
              type="hidden"


              value="{{request('category')}}"

            />
            @endif
            @if (request('author'))
            <input
            name="author"
            type="hidden"


            value="{{request('author')}}"

          />

            @endif

      <div class="input-group mb-3">
        <input
          name="search"
          type="text"
          autocomplete="false"
          class="form-control"
          value="{{request('search')}}"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">

        @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog"/>
            </div>

        @empty
        <div class=" text-center">No Found Blog</div>
        @endforelse

        {{$blogs->links()}}
    </div>
  </section>
