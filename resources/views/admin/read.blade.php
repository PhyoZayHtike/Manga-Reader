<x-app-layout>
<link rel="stylesheet" href="{{asset('css/main.css')}}">
    <button class="go-top-btn rounded-3">
        <i class="fa-regular fa-circle-up fs-1"></i>
    </button>
     <div class="container-fluid">
        <div class="row">
           <div class="col-12 p-2 col-md-11 offset-md-1 mt-2">
            <a class="text-decoration-none hoverBlue" href="">Home</a> / <a  class="text-decoration-none hoverBlue" href="">{{$data->title}}</a> / <a  class="text-decoration-none hoverBlue" href="">Chapter {{$chapterNum->chapter_number}}</a>
          </div>
                  <!-- drop drown -->
          <div class="col-12 p-2 col-md-9 offset-md-1 mt-2 d-flex justify-content-between">
            <div class="btn-group">
                <button class="btn btn-light border border-dark fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Chapter {{$chapterNum->chapter_number}}
                </button>
                <ul style="max-height: 200px; overflow-y: auto;" id="scrollable-dropdown" class="dropdown-menu">
                 @php
                    $previousChapter = null;
                @endphp

                @foreach ($allChapters as $c)
                    @if ($c->chapter_number !== $previousChapter)
                                <li><a class="dropdown-item" href="{{ route('admin#view', ['chapterId' => $data->id, 'chapterNumber' => $c->chapter_number]) }}">
                                    Chapter {{ $c->chapter_number }}
                                </a></li>
                        @php
                            $previousChapter = $c->chapter_number;
                        @endphp
                    @endif
                @endforeach
                </ul>
             </div>
             <!-- next or prev -->
             <div class="">
                @if ($prevChapter)
                <a href="{{route('admin#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number -1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2"><i class="fa-solid fa-arrow-left"></i> Prev</button></a>
                @endif
                @if ($nextChapter)
                <a href="{{route('admin#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number +1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2">Next <i class="fa-solid fa-arrow-right"></i></button></a>
                @endif
             </div>
          </div>
        </div>
     </div>
     <!-- upload img -->
     <div class="col-12 p-2 col-md-12 m-md-auto col-lg-8 mt-3 mt-md-3">
        @foreach ($chapter as $c)
        <img class="w-100" src="{{ asset('storage/chapters/' . $c->image_path) }}" alt="Chapter Image">
        @endforeach
    </div>
            <!-- drop drown -->
            <div class="col-12 mt-5 p-2 col-md-9 offset-md-1 d-flex justify-content-between">
                <div class="btn-group">
                    <button class="btn btn-light border border-dark fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                      Chapter {{$chapterNum->chapter_number}}
                    </button>
                    <ul style="max-height: 200px; overflow-y: auto;" id="scrollable-dropdown" class="dropdown-menu">
                    @php
                        $previousChapter = null;
                    @endphp

                    @foreach ($allChapters as $c)
                        @if ($c->chapter_number !== $previousChapter)
                                    <li><a class="dropdown-item" href="{{ route('admin#view', ['chapterId' => $data->id, 'chapterNumber' => $c->chapter_number]) }}">
                                        Chapter {{ $c->chapter_number }}
                                    </a></li>
                            @php
                                $previousChapter = $c->chapter_number;
                            @endphp
                        @endif
                    @endforeach
                    </ul>
                 </div>
                 <!-- next or prev -->
                 <div class="">
                @if ($prevChapter)
                  <a href="{{route('admin#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number -1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2"><i class="fa-solid fa-arrow-left"></i> Prev</button></a>
                @endif
                @if ($nextChapter)
                  <a href="{{route('admin#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number +1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2">Next <i class="fa-solid fa-arrow-right"></i></button></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/master.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.dropdown-item').on('click', function () {
      $('#scrollable-dropdown').css('max-height', '200px'); // Reset the max-height
    });
  });
</script>
</x-app-layout>
