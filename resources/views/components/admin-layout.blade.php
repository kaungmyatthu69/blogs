<x-layout>
    <x-slot name="title">Admin Dashboard</x-slot>
    <div class=" container">
        <div class=" row">
            <div class=" col-md-2 mt-3">

                <ul class="list-group mt-5">
                    <li class="list-group-item"><a href="/admin/blogs">Dashborad</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Blogs Create</a></li>

                  </ul>
            </div>
            <div class=" col-md-10">

                {{$slot}}
            </div>

        </div>

    </div>
</x-layout>
