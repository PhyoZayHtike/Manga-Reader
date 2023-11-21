<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reader</title>
    <!-- bootstrap -->
    <link rel="icon" href="{{asset('mLogo.jpg')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
      <!-- detail -->
      <div class="container">
        <div class="mt-3">
            <a class="text-decoration-none hoverBlue" href="{{ route('admin#home') }}">Home</a> / <a  class="text-decoration-none hoverBlue" href="">{{$detail->genre_name}}</a> / <a  class="text-decoration-none hoverBlue" href="">{{$detail->title}}</a>
        </div>
        <div class="mt-4 mb-4 text-warning">
            {{$detail->title}}
        </div>
        <div class="row">
            <div class="col-7 m-auto m-lg-0 col-lg-4 mb-3 text-center">
                <img class="img-thumbnail w-75 rounded-3" src="{{asset('storage/mainPhoto/'.$detail->image)}}" alt="">
            </div>
            <div style="background-color: whitesmoke;" class="col-11 m-auto col-lg-7 offset-lg-1 p-4 shadow-sm rounded-2">
                <div class="fs-3 mb-3 mt-lg-3">
                    @if ($detail->rating == 1)
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               @elseif ($detail->rating == 2)
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               @elseif ($detail->rating == 3)
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-regular fa-star"></i>
               <i class="fa-regular fa-star"></i>
               @elseif ($detail->rating == 4)
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-regular fa-star"></i>
               @elseif ($detail->rating == 5)
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               <i class="fa-solid fa-star text-warning"></i>
               @endif
               <span class="">{{$detail->rating}}</span>
                </div>
                <div class="row mt-lg-5">
                    <div class="col-lg-6 mt-lg-1 d-none d-lg-block">
                        <h5 class="text-black">Title</h5>
                        <p class="fw-bold text-muted">{{$detail->title}}</p>
                    </div>
                    <div class="col-lg-6 mt-lg-1">
                        <h5 class="text-black">Rating</h5>
                        <p class="fw-bold text-muted">Average {{$detail->rating}} / 5</p>
                    </div>
                    <div class="col-lg-6 mt-lg-4">
                        <h5 class="text-black">Author(s)</h5>
                        <p class="fw-bold text-muted">{{$detail->author_name}}</p>
                    </div>
                    <div class="col-lg-6 mt-lg-4">
                        <h5 class="text-black">Artist(s)</h5>
                        <p class="fw-bold text-muted">{{$detail->artist_name}}</p>
                    </div>
                    <div class="col-lg-6 mt-lg-4">
                        <h5 class="text-black">Genre(s)</h5>
                        <p class="fw-bold text-muted">{{$detail->genre_name}}</p>
                    </div>
                    <div class="col-lg-6 mt-lg-4">
                        <h5 class="text-black">Status</h5>
                        <p class="fw-bold text-muted">OnGoing</p>
                    </div>
                    <div class="d-flex justify-content-around justify-content-lg-start mt-4">
                       @if (count($chapters) != 0)
                       <a class="btn btn-outline-dark btn-warning fw-bold text-white" href="{{ route('admin#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapters->first()->chapter_number]) }}">
                        Read First
                    </a>
                    <a class="btn btn-outline-dark btn-warning fw-bold text-white ms-2" href="{{ route('admin#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapters->last()->chapter_number]) }}">
                        Read Last
                    </a>
                       @endif
                    </div>
                </div>
            </div>
            <!-- review -->
            <div class="col-12 col-lg-7 p-2 border-top border-end mt-3 mt-lg-5">
                <div class="h4 fw-bold">
                    <i class="fa-solid fa-arrows-turn-right me-3 ms-4"></i> SUMMARY
                 <hr class="m-auto mt-3">
                </div>
                <div class="p-3 text-muted">
                    {{$detail->summary}}
                </div>
            </div>
            <!-- chapter list -->
            <div class="row mt-4 p-3">
              <div class="col-10 col-md-6 ">
                <h2 class="text-dark-emphasis">
                    {{$detail->title}} - Chapters List
                </h2>
              </div>
              <!-- 1 to 99 -->
              <div class="col-2 mt-2">
                <form action="{{ route('admin#detail', $detail->id) }}" method="GET">
                    <input type="hidden" name="order" id="order" value="{{ $order }}">
                    <button type="submit" class="btn" onclick="toggleSort()">
                        <i style="cursor: pointer;" class="fa-solid fa-arrow-down-up-across-line fs-2 text-dark-emphasis"></i>
                    </button>
                </form>
              </div>
              <hr>
            </div>
          {{-- upload chapter --}}
            <div class="col-11 m-auto m-md-0 col-md-5 p-5 shadow-sm rounded-4 border">
                <form action="{{route('admin#uploadChapter')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="hidden" name="chapterId" value="{{ $detail->id }}">
                        <div class="mb-2">
                        <label for="">Chapter</label>
                        <input type="number" name="chapterNumber" class="form-control" placeholder="Enter Chapter Number . . .">
                        @error('chapterNumber')
                             <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                        <div class="">
                            <label for="chapterImages">Upload Chapter Images</label>
                        <input type="file" class="form-control" name="chapterImages[]" multiple>
                        @error('chapterImages')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end"><i class="fa-solid fa-cloud-arrow-up py-2 me-2"></i>Upload Chapters</button>
                   </form>
               </div>
               <hr class="mt-5">

            <!-- chapter btn -->
            <div class="row m-auto">
                 @php
                    $previousChapter = null;
                @endphp

                @foreach ($chapters as $chapter)
                    @if ($chapter->chapter_number !== $previousChapter)
                        <div class="col-6 col-md-4 col-xxl-2 mt-3">
                            <a class="text-decoration-none text-info-emphasis" href="{{ route('admin#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapter->chapter_number]) }}">
                            <div style="background-color: #e1e1e1;" class="text-center p-2 rounded-3  rounded-bottom-0 fw-medium">
                                    Chapter {{ $chapter->chapter_number }}
                                <div><small>{{ $chapter->created_at->format('m/d/Y') }}</small></div>
                            </div>
                                </a>
                            <a href="{{ route('admin#chapterDelete', ['chapterId' => $detail->id, 'chapterNumber' => $chapter->chapter_number]) }}" class="btn btn-sm fw-bold w-100 btn-danger rounded-3 rounded-top-0">
                                Delete
                            </a>
                        </div>
                        @php
                            $previousChapter = $chapter->chapter_number;
                        @endphp
                    @endif
                @endforeach


           {{-- <div class="text-center cursor-pointer mt-4">
                <span style="cursor: pointer;" class="fw-bold btn text-dark">Show More <i class="fa-solid fa-caret-down"></i></span>
              </div> --}}
            </div>
        </div>
      </div>

    <!-- footer -->
    <hr style="border: 1px solid black;">
    <div class="container mt-4 mb-5">
      <div class="row">
        <div class="col-12 fs-3 d-flex justify-content-around">
          <a title="Facebook" class="text-decoration-none ms-2" href="">
            <i class="fa-brands fa-facebook"></i>
          </a>
           <a title="Email" class="text-decoration-none ms-2" href="">
            <i class="fa-solid fa-envelope"></i>
           </a>
          <a title="Telegram" class="text-decoration-none ms-2" href="">
            <i class="fa-brands fa-telegram"></i>
          </a>
          <a title="Youtube" class="text-decoration-none ms-2" href="">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </div>
        <div class="col-12">
          <p class="text-center">
            <hr>
            <strong>Welcome to MyReader</strong>
            <br>
            Your one-stop destination for all things anime, manga, manhwa, manhua, video games, and cosplay. Discover a world of entertainment and creativity.
            <br><br>
            Share your:
            <ul>
              <li>Anime-related memes</li>
              <li>Recommendations</li>
              <li>Reviews</li>
              <li>Manga suggestions</li>
              <li>Character fanfiction</li>
              <li>Favorite lines</li>
              <li>And all things anime, especially memes</li>
            </ul>
            <br>
            Our community welcomes enthusiasts of all levels, from beginners to the otaku elite.
            <br><br>
            Join us and support MyReader.COM by reaching out to <a href="mailto:myreader@gmail.com">myreader@gmail.com</a>. We're dedicated to making MyReader.COM the premier hub for reading manhwa, manga, and manhua comics from around the world.
            <hr>
            &copy; 2023 MYREADER TOP Inc. All rights reserved
          </p>
        </div>

      </div>
    </div>
</body>
<script>
    function toggleSort() {
         var orderInput = document.getElementById('order');
         orderInput.value = orderInput.value === 'asc' ? 'desc' : 'asc';
     }
 </script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
</x-app-layout>
