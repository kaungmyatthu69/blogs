<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/" class="nav-link">Home</a>
       @auth
       <img src="{{auth()->user()->avator}}" width="40" height="40" class=" rounded-circle" alt="">
       <a href="/" class="nav-link">Welcome {{auth()->user()->name}}</a>
       <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link btn btn-link">logout</button>
     </form>
        @else
       <a href="/register" class="nav-link">Register</a>
       <a href="/login" class="nav-link">Login</a>

       @endauth
       @can('admin')

       <a href="/admin/blogs" class="nav-link">Dashboard</a>
       @endcan



        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>
