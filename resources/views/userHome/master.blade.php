<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reader</title>
    <link rel="icon" href="{{asset('mLogo.jpg')}}" type="image/x-icon">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
   <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg p-3 bg-body-tertiary shadow-sm border-bottom">
        <div class="container">
          <a class="navbar-brand fw-bold" href="#">My Reader</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item px-lg-3 px-sm-0">
                <a class="nav-link fw-bold underline" aria-current="page" href="{{route('user#home')}}"><i class="fa-solid fa-house me-1"></i>Home</a>
              </li>
              <li class="nav-item px-lg-3 px-sm-0">
                <a class="nav-link fw-bold underline" href="{{route('user#filter',"manga")}}"><span>All Manga</span></a>
              </li>
              <li class="nav-item dropdown px-lg-3 px-sm-0">
                <a class="nav-link fw-bold underline" href="{{route('user#filter',"4")}}"><span>Top Rating</span></a>
              </li>
              {{-- Contact As --}}
              <li class="nav-item px-lg-3 px-sm-0">
                <a type="button" class="nav-link fw-bold underline" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Contact As</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New Message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Please Login First ! " id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control"  placeholder="Please Login First ! " id="message-text"></textarea>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route('login')}}">
                                <button type="button" class="btn btn-primary">Send message</button>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
              </li>
            </ul>
            <form action="{{route('user#home')}}" method="GET" class="d-flex" role="search">
              <input name="search" class="form-control me-2" value="{{request('search')}}" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <!-- gener and login -->
      <div style="background-color: #dfdfdf;" class="container-fluid p-2">
           <div class="container d-flex justify-content-between">
            <ul class="nav">
                <a class="nav-link hoverText fw-bold" aria-current="page" href="{{route('user#filter',"manhua")}}">Manhua</a>
                <a class="nav-link hoverText fw-bold" href="{{route('user#filter',"manhwa")}}">Manhwa</a>
                <a class="nav-link hoverText fw-bold" aria-current="page" href="{{route('user#filter',"manga")}}">Manga</a>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle hoverText fw-bold" id="genersBtn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    GENERS
                  </a>
                </li>
            </ul>
          <div class="nav-item">
            <a class="btn border border-dark-subtle rounded-5 fw-bold ms-2 mb-1 mb-md-0 hoverBlack" aria-current="page" href="{{route('login')}}">Sign in</a>
            <a class="btn border border-dark-subtle rounded-5 fw-bold ms-2 hoverBlack" href="{{route('register')}}">Sign up</a>
          </div>
        </div>
      </div>

      {{-- geners --}}
      <div id="genersContainer" style="background-color:#ececec;" class="container p-3 showGeners col-12 col-md-8 col-lg-7">
            <ul class="nav">
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"action")}}">Action</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"romance")}}">Romance</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"isekai")}}">Isekai</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"fantasy")}}">Fantasy</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"slice-of-Life")}}">Slice of Life</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"sci-fi")}}">Sci-Fi (Science Fiction)</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"horror")}}">Horror</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"mystery")}}">Mystery</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"comedy")}}">Comedy</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"drama")}}">Drama</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"adventure")}}">Adventure</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"school-life")}}">School Life</a>
              <a class="nav-link hoverText fw-bold" href="{{route('user#genres',"harem")}}">Harem</a>
          </ul>
      </div>

       @yield('main')

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
<script src="{{asset('js/master.js')}}"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
