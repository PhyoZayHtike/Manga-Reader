@extends('userHome.master')
@section('main')
      <!-- detail -->
      <div class="container">
        <div class="mt-3">
            <a class="text-decoration-none hoverBlue" href="{{route('user#home')}}">Home</a> / <a  class="text-decoration-none hoverBlue" href="">{{$detail->genre_name}}</a> / <a  class="text-decoration-none hoverBlue" href="">{{$detail->title}}</a>
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
                        <a class="btn btn-outline-dark btn-warning fw-bold text-white" href="{{ route('user#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapters->first()->chapter_number]) }}">
                            Read First
                        </a>
                        <a class="btn btn-outline-dark btn-warning fw-bold text-white ms-2" href="{{ route('user#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapters->last()->chapter_number]) }}">
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
                {{$detail->title}}
                </h2>
              </div>
              <!-- 1 to 99 -->
              <div class="col-2 mt-2">
                <form action="{{ route('user#detail', $detail->id) }}" method="GET">
                    <input type="hidden" name="order" id="order" value="{{ $order }}">
                    <button type="submit" class="btn" onclick="toggleSort()">
                        <i style="cursor: pointer;" class="fa-solid fa-arrow-down-up-across-line fs-2 text-dark-emphasis"></i>
                    </button>
                </form>
              </div>
              <hr>
            </div>

            <!-- chapter btn -->
            <div class="row m-auto">
            @php
                $previousChapter = null;
            @endphp

            @foreach ($chapters as $chapter)
                @if ($chapter->chapter_number !== $previousChapter)
                    <div class="col-6 col-md-4 col-xl-2 mt-3">
                        <a class="text-decoration-none text-info-emphasis" href="{{ route('user#view', ['chapterId' => $detail->id, 'chapterNumber' => $chapter->chapter_number]) }}">
                        <div style="background-color: #e1e1e1;" class="text-center p-2 rounded-3 fw-medium">
                                Chapter {{ $chapter->chapter_number }}
                            <div><small>{{ $chapter->created_at->format('m/d/Y') }}</small></div>
                        </div>
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
      <script>
       function toggleSort() {
            var orderInput = document.getElementById('order');
            orderInput.value = orderInput.value === 'asc' ? 'desc' : 'asc';
        }
    </script>
@endsection

