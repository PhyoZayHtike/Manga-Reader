<x-app-layout>
    <div class="container mt-5">
        <div class="col-12 col-lg-10 m-auto">
            <form action="{{route('admin#account')}}" method="GET" class="d-flex mb-3 col-8 offset-4 mt-3 col-md-5 offset-md-7 col-lg-3 offset-lg-9" role="search">
                <input name="search" value="{{request('search')}}" class="form-control me-2 rounded-2" type="search" placeholder="Search title . . ." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell">Id</th>
                            <th class="d-none d-md-table-cell">Name</th>
                            <th class="">Email</th>
                            <th>Setting</th>
                            <th class="d-none d-md-table-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <input type="hidden" value="{{$d->id}}" id="userId">
                            <td class="d-none d-md-table-cell">{{$d->id}}</td>
                            <td class="d-none d-md-table-cell">{{$d->name}}</td>
                            <td class="">{{$d->email}}</td>
                            <td class="col-lg-2">
                                @if (Auth::user()->id == $d->id )
                                <div class="text-success fw-medium">
                                    Your Account!
                                </div>
                                @else
                                <select class="form-control roleChange" name="role">
                                    <option disabled value="">Choose Role...</option>
                                    <option value="admin" @if ($d->role == 'admin') selected @endif>Admin</option>
                                    <option value="user" @if ($d->role == 'user') selected @endif>User</option>
                                </select>
                                @endif

                            </td>
                            <td class="d-none d-md-table-cell">
                                @if (Auth::user()->id == $d->id )
                                 <div class="text-success fw-medium">
                                    Your Account!
                                 </div>
                                @else
                                <a href="{{route('admin#accountDelete',$d->id)}}" class="btn btn-sm btn-danger"><i class="fa-solid fa-user-slash me-1"></i>Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (!count($data))
                <div style="height: 60vh" class="d-flex align-items-center justify-content-center">
                    <h1 class="h1 mt-5 mb-5 fw-bold">
                        Account Not Found!
                    </h1>
                 </div>
                @endif
                @if (count($data))
                <div class="d-flex justify-content-between">
                    Total Account - {{count($data)}}
                    {{$data->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
      $(document).ready(function(){
        $('.roleChange').change(function(){
        $role = $(this).val();
        $parentNode = $(this).parents('tr');
        $userId = $parentNode.find('#userId').val();
        $data = {
            'role' : $role ,
            'userId' :$userId ,
        }

        $.ajax({
        type : 'get' ,
        url : '/admin/change/role' ,
        data : $data ,
        dataType : 'json' ,
     });
     window.location.href = "/admin/account";
    });
  });
   </script>

</x-app-layout>
