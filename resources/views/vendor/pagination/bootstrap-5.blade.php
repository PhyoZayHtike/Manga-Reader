<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-around flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
               <div class="me-5">
                @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link fw-bold shadow-sm"><i class="fa-solid fa-angles-left me-2"></i>Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link fw-bold shadow-sm" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa-solid fa-angles-left me-2"></i>Previous</a>
                </li>
            @endif
               </div>

                {{-- Next Page Link --}}
                <div class="ms-5">
                    @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link fw-bold shadow-sm" href="{{ $paginator->nextPageUrl() }}" rel="next">Next<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link fw-bold shadow-sm">Next<i class="fa-solid fa-angles-right ms-2"></i></span>
                    </li>
                @endif
                </div>
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  {{-- Previous Page Link --}}
                  @if ($paginator->onFirstPage())
                      <li class="page-item disabled">
                          <span class="page-link" aria-hidden="true">Previous</span>
                      </li>
                  @else
                      <li class="page-item">
                          <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                      </li>
                  @endif

                  {{-- Pagination Elements --}}
                  @foreach ($elements as $element)
                      {{-- Array Of Links --}}
                      @if (is_array($element))
                          @foreach ($element as $page => $url)
                              @if ($page == $paginator->currentPage())
                                  <li class="page-item active" aria-current="page">
                                      <span class="page-link">{{ $page }}</span>
                                  </li>
                              @else
                                  <li class="page-item">
                                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                  </li>
                              @endif
                          @endforeach
                      @endif
                  @endforeach

                  {{-- Next Page Link --}}
                  @if ($paginator->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                      </li>
                  @else
                      <li class="page-item disabled">
                          <span class="page-link" aria-hidden="true">Next</span>
                      </li>
                  @endif
                </ul>
              </nav>

        </div>
    </nav>
@endif
