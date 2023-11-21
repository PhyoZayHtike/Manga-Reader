@extends('userHome.master')
@section('main')
        <button class="go-top-btn rounded-3">
            <i class="fa-regular fa-circle-up fs-1"></i>
        </button>
     <div class="container-fluid">
        <div class="row">
           <div class="col-12 p-2 col-md-11 offset-md-1 mt-5">
            <h3 class="fw-semibold">{{$data->title}} - Chapter {{$chapterNum->chapter_number}}</h3>
           </div>
           <div class="col-12 p-2 col-md-11 offset-md-1 mt-2">
            <a class="text-decoration-none hoverBlue" href="{{route('user#home')}}">Home</a> / <a  class="text-decoration-none hoverBlue" href="">{{$data->title}}</a> / <a  class="text-decoration-none hoverBlue" href="">Chapter {{$chapterNum->chapter_number}}</a>
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
                                <li><a class="dropdown-item" href="{{ route('user#view', ['chapterId' => $data->id, 'chapterNumber' => $c->chapter_number]) }}">
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
                <a href="{{route('user#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number -1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2"><i class="fa-solid fa-arrow-left"></i> Prev</button></a>
              @endif
              @if ($nextChapter)
                <a href="{{route('user#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number +1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2">Next <i class="fa-solid fa-arrow-right"></i></button></a>
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
                                    <li><a class="dropdown-item" href="{{ route('user#view', ['chapterId' => $data->id, 'chapterNumber' => $c->chapter_number]) }}">
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
                    <a href="{{route('user#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number -1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2"><i class="fa-solid fa-arrow-left"></i> Prev</button></a>
                  @endif
                  @if ($nextChapter)
                    <a href="{{route('user#view',['chapterId' => $data->id, 'chapterNumber' => $chapterNum->chapter_number +1])}}"><button class="btn btn-primary fw-semibold rounded-1 py-2">Next <i class="fa-solid fa-arrow-right"></i></button></a>
                  @endif
                 </div>
              </div>
@endsection
