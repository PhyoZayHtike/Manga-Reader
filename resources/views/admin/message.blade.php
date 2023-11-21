<x-app-layout>
    <div class="container p-4 mt-4">
        <div class="row d-flex justify-content-around">
       @if (count($message))
       @foreach ($message as $m)
       <div class="card col-12 col-md-5 mb-4">
           <div class="card-body">
             <h5 class="card-title fw-bold fs-5"><i class="fa-solid fa-user me-2"></i>{{$m->name}}</h5>
             <hr>
             <p class="card-text mt-1 p-1">{{$m->message}}</p>
             <div class="d-flex justify-content-between mt-3">
               <h5 class="fw-bold"><i class="fa-solid fa-calendar me-1"></i>{{$m->created_at->format('m/d/y')}}</h5>
               <a href="{{route('admin#Deletemessage',$m->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Delete</a>
             </div>
           </div>
         </div>
      @endforeach
      @else
      <h1 style="height: 60vh" class="fs-1 fw-bold d-flex justify-content-center align-items-center">Message Not Found!</h1>
       @endif
       <div class="">
        {{$message->links()}}
       </div>
    </div>
      </div>
</x-app-layout>
