<x-app-layout>
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<div class="container">
    @if (count($detail) != 0)
    <form action="{{route('admin#home')}}" method="GET" class="d-flex col-8 offset-4 mt-3 col-md-5 offset-md-7 col-lg-3 offset-lg-9" role="search">
        <input name="search" value="{{request('search')}}" class="form-control me-2 rounded-2" type="search" placeholder="Search title . . ." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    @endif
</div>
<div class="container">
    <div class="row ms-1 ms-md-4">
    @if (count($detail) != 0)
    @foreach ($detail as $d)
    <div class="col-12 col-md-4 col-xl-3 col-xxl-3 mb-4 mt-3">
      <div class="row">
       <div class="col-4 col-md-10 col-lg-8 col-xxl-9 zoom">
        <a href="{{route('admin#detail',$d->id)}}"><img class="mainImg img w-100 mb-2 rounded-1" src="{{asset('storage/mainPhoto/'.$d->image)}}" alt="Photo"></a>
       </div>
       <div class="col-7 col-md-12 col-lg-10 col-xxl-10 mt-1">
         <a class="text-black link-underline-opacity-0 fs-5" style="text-decoration: none; font-weight: 500;" href="{{route('admin#detail',$d->id)}}"><span class="titleSet">{{$d->title}}</span></a>
         <div class="">
             @if ($d->rating == 1)
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             @elseif ($d->rating == 2)
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             @elseif ($d->rating == 3)
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-regular fa-star"></i>
             <i class="fa-regular fa-star"></i>
             @elseif ($d->rating == 4)
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-regular fa-star"></i>
             @elseif ($d->rating == 5)
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             <i class="fa-solid fa-star text-warning"></i>
             @endif
           <span class="">{{$d->rating}}</span>
         </div>
           <div class="row">
             <div class="col-11 col-xxl-11">
               <div class="d-flex justify-content-between mt-2">
            {{-- last chapter --}}
            @php
                $previousChapter = null;
                $lastChapter = null;
            @endphp

            @foreach ($chapters as $chapter)
                @if ($d->id == $chapter->chapter_id)
                    @if ($chapter->chapter_number !== $previousChapter)
                        @php
                            $previousChapter = $chapter->chapter_number;
                            $lastChapter = $chapter;
                        @endphp
                    @endif
                @endif
            @endforeach

            @if ($lastChapter)
                    <a class="btn btn-sm btn-light border shadow-sm fw-medium text-muted rounded-4" href="{{ route('admin#view', ['chapterId' => $d->id, 'chapterNumber' => $lastChapter->chapter_number]) }}">
                        Chapter {{ $lastChapter->chapter_number }}
                    </a>
            @endif
                   <a href="{{route('admin#mangaDelete',$d->id)}}" onclick="return confirm('Are you sure you want to Delete?')">
                    <button class="btn bg-danger text-white btn-sm btn-light rounded-3">Delete</button>
                   </a>
               </div>
               <div class="d-flex justify-content-between mt-2">
              {{--first chapter --}}
                @php
                    $firstChapter = null;
                @endphp

                @foreach ($chapters as $chapter)
                    @if ($d->id == $chapter->chapter_id && is_null($firstChapter))
                        @php
                            $firstChapter = $chapter;
                        @endphp
                    @endif
                @endforeach

                @if ($firstChapter)
                        <a class="btn btn-sm btn-light border shadow-sm fw-medium text-muted rounded-4" href="{{ route('admin#view', ['chapterId' => $d->id, 'chapterNumber' => $firstChapter->chapter_number]) }}">
                            Chapter {{ $firstChapter->chapter_number }}
                        </a>
                @endif
                 <span class="mt-1">{{$d->created_at->format('Y/m/d')}}</span>
               </div>
             </div>
           </div>
       </div>
      </div>
   </div>
  @endforeach
  {{$detail->links("vendor.pagination.bootstrap-5")}}
  @else
  <div style="height: 60vh" class="wrapper d-flex align-items-center justify-content-center">
    <h1 class="h1 typing-demo mt-5 mb-5 fw-bold">Manga Not Found!</h1>
 </div>
@endif

</div>
</div>
<!-- footer -->
<hr class="mt-5" style="border: 1px solid black;">
<div class="container mt-4">
  <div class="row">
    <div class="col-12 fs-3 d-flex justify-content-around mb-3">
      <a title="Facebook" class="text-decoration-none ms-2" href="">
        <i class="text-primary fa-brands fa-facebook"></i>
      </a>
       <a title="Email" class="text-decoration-none ms-2" href="">
        <i class="text-primary fa-solid fa-envelope"></i>
       </a>
      <a title="Telegram" class="text-decoration-none ms-2" href="">
        <i class="text-primary fa-brands fa-telegram"></i>
      </a>
      <a title="Youtube" class="text-decoration-none ms-2" href="">
        <i class="text-primary fa-brands fa-youtube"></i>
      </a>
    </div>
    <div class="col-12">
        <p class="text-center">
            <hr class="mb-4">
            <strong style="font-size: 1.5em; color: #333;">Welcome to MyReader</strong>
            <br>
            <span style="color: #555;">Your one-stop destination for all things anime, manga, manhwa, manhua, video games, and cosplay. Discover a world of entertainment and creativity.</span>
            <br><br>
            <span style="font-weight: bold; color: #007BFF;">Share your:</span>
            <ul style="list-style-type: disc; margin-left: 20px;">
                <li>Anime-related memes</li>
                <li>Recommendations</li>
                <li>Reviews</li>
                <li>Manga suggestions</li>
                <li>Character fanfiction</li>
                <li>Favorite lines</li>
                <li>And all things anime, especially memes</li>
            </ul>
            <br>
            <span style="color: #555;">Our community welcomes enthusiasts of all levels, from beginners to the otaku elite.</span>
            <br><br>
            <span style="color: #007BFF;">Join us and support MyReader.COM by reaching out to <a href="mailto:myreader@gmail.com" style="color: #007BFF;">myreader@gmail.com</a>.</span>
            <br>
            <span style="color: #555;">We're dedicated to making MyReader.COM the premier hub for reading manhwa, manga, and manhua comics from around the world.</span>
            <hr style="border-color: #888;">
            <div class="text-center p-4" style="color: #888; font-size: 0.8em;">&copy; 2023 MYREADER TOP Inc. All rights reserved</div>
        </p>
    </div>
  </div>
</div>
</x-app-layout>
