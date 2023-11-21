<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mt-md-5 m-auto shadow-lg p-4 rounded-4 mb-lg-5">
                <div class="text-center mb-3 fs-4 fw-bold">Upload Home Page For</div>
                <form action="{{route('admin#create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="">
                    <label class="mb-1" for="">Image</label>
                    <input name="image" class="form-control p-3 border border-black rounded-3  @error('image') is-invalid @enderror" aria-required="true" aria-invalid="false" type="file" name="" id="">
                    @error('image')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Title Name</label>
                    <input name="name" class="form-control border-black rounded-3 @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" type="text" value='{{old('name')}}' placeholder="Enter Manga Or Manhwa Name . . .">
                    @error('name')
                     <div class="invalid-feedback">
                       {{$message}}
                     </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Type</label>
                    <select name="typeList" class="form-select rounded-3 border-black @error('typeList') is-invalid @enderror"  aria-required="true" aria-invalid="false" aria-label="Default select example">
                        <option value="" selected>Select - Type</option>
                        <option value="manga" @if(old('typeList') == 'manga') selected @endif>Manga</option>
                        <option value="manhua" @if(old('typeList') == 'manhua') selected @endif>Manhua</option>
                        <option value="manhwa" @if(old('typeList') == 'manhwa') selected @endif>Manhwa</option>
                      </select>
                      @error('typeList')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                     @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">SUMMARY</label>
                    <textarea name="summary" class="form-control border-black rounded-3 @error('summary') is-invalid @enderror" aria-required="true" aria-invalid="false"  placeholder="Enter Summary . . ." id="" rows="3">{{old('summary')}}</textarea>
                    @error('summary')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Author Name</label>
                    <input name="authorName" class="form-control border-black rounded-3 @error('authorName') is-invalid @enderror" type="text" aria-required="true" aria-invalid="false" value='{{old('authorName')}}' placeholder="Enter Author Name . . . ">
                    @error('authorName')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Artist Name</label>
                    <input name="artistName" class="form-control border-black rounded-3 @error('artistName') is-invalid @enderror" type="text" aria-required="true" aria-invalid="false" value='{{old('artistName')}}' placeholder="Enter Artist Name . . .">
                    @error('artistName')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Select Genre</label>
                    <select name="genreName" class="form-select rounded-3 border-black @error('genreName') is-invalid @enderror"  aria-required="true" aria-invalid="false" aria-label="Default select example">
                        <option value="" selected>Select - Genre</option>
                        <option value="action" @if(old('genreName') == 'action') selected @endif>Action</option>
                        <option value="romance" @if(old('genreName') == 'romance') selected @endif>Romance</option>
                        <option value="isekai" @if(old('genreName') == 'isekai') selected @endif>Isekai</option>
                        <option value="fantasy" @if(old('genreName') == 'fantasy') selected @endif>Fantasy</option>
                        <option value="slice-of-life" @if(old('genreName') == 'slice-of-life') selected @endif>Slice of Life</option>
                        <option value="sci-fi" @if(old('genreName') == 'sci-fi') selected @endif>Sci-Fi (Science Fiction)</option>
                        <option value="horror" @if(old('genreName') == 'horror') selected @endif>Horror</option>
                        <option value="mystery" @if(old('genreName') == 'mystery') selected @endif>Mystery</option>
                        <option value="manhwa" @if(old('genreName') == 'manhwa') selected @endif>Comedy</option>
                        <option value="comedy" @if(old('genreName') == 'comedy') selected @endif>Drama</option>
                        <option value="adventure" @if(old('genreName') == 'adventure') selected @endif>Adventure</option>
                        <option value="school-life" @if(old('genreName') == 'school-life') selected @endif>School Life</option>
                        <option value="harem" @if(old('genreName') == 'harem') selected @endif>Harem</option>
                      </select>
                      @error('genreName')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                     @enderror
                </div>
                <div class="mt-3">
                    <label class="mb-1" for="">Rating</label>
                    <input name="rating" aria-required="true" aria-invalid="false" class="form-control border-black rounded-3 @error('rating') is-invalid @enderror" type="number" min="1" max="5" value='{{old('rating')}}' placeholder="Enter Rating Star 1 to 5">
                    @error('rating')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                </div>
                <div class="mt-3 float-end">
                    <button class="btn btn-primary fw-bold py-2 px-4"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</x-app-layout>
