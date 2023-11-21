 @extends('userHome.master')
 @section('main')
     <!-- manga list -->
     @if (count($data) != 0)
         <div class="container mt-4">
             <div class="row ms-1 ms-md-4">
                 @foreach ($data as $d)
                     <div class="col-12 col-md-4 col-xl-3 col-xxl-3 mb-4 mt-4">
                         <div class="row">
                             <div class="col-4 col-md-10 col-lg-8 col-xxl-9 zoom">
                                 <a href="{{ route('user#detail', $d->id) }}"><img
                                         class="mainImg img w-100 mb-2 rounded-1" src="{{ asset('storage/mainPhoto/' . $d->image) }}"
                                         alt="Photo"></a>
                             </div>
                             <div class="col-7 col-md-12 col-lg-10 col-xxl-10 mt-2">
                                 <a class="text-black link-underline-opacity-0 h5"
                                     style="text-decoration: none; font-weight: 500;"
                                     href="{{ route('user#detail', $d->id) }}"><span
                                         class="titleSet">{{ Illuminate\Support\Str::limit($d->title, $limit = 50, $end = ' . . .') }}</span></a>
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
                                     <span class="">{{ $d->rating }}</span>
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
                                                 <a class="btn btn-sm btn-light border shadow-sm fw-medium text-muted rounded-4"
                                                     href="{{ route('user#view', ['chapterId' => $d->id, 'chapterNumber' => $lastChapter->chapter_number]) }}">
                                                     Chapter {{ $lastChapter->chapter_number }}
                                                 </a>
                                             @endif
                                                 <button class="btn btn-light btn-sm shadow-sm fw-bold btn-light rounded-3 text-danger">New</button>
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
                                                      <a class="btn btn-sm btn-light border shadow-sm fw-medium text-muted rounded-4" href="{{ route('user#view', ['chapterId' => $d->id, 'chapterNumber' => $firstChapter->chapter_number]) }}">
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
             </div>
             <div class="mt-2">
                {{$data->links('vendor.pagination.bootstrap-5')}}
             </div>
         </div>
     @else
         <div style="height: 60vh" class="wrapper d-flex align-items-center justify-content-center">
            <h1 class="h1 typing-demo mt-5 mb-5 fw-bold">Manga Not Found!</h1>
         </div>
     @endif
 @endsection
