<x-layout>
    <x-slot name="title">login Form</x-slot>
    <div class="container  ">
        <div class="row ">
            <div class="col-md-5 mx-auto mt-3">
                <h2 class=" text-primary text-center"> Register Form</h2>
                <div class="card  shadow-sm my-4 p-3">
                    <form method="POST">
                        @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name='email' required value="{{old('email')}}" aria-describedby="emailHelp">

                            <x-error name='email'/>
                          </div>

                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" required name='password' >
                        </div>
                        <x-error name='password'/>



                            <button type="submit" class="btn btn-primary">Submit</button>

                        @foreach ($errors->all() as $error)
                            <div>
                                {{$error}}
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
