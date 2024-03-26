<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Twitter Clone - Final</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset("styles/twitter-style.css")}}" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  @livewireStyles

</head>

<body @if(App::getLocale()=='ar' ) style="dir:rtl" @endif class=" m-0 p-0 ">
  
    <div class="row col-12">
      <!-- sidebar starts -->
      <div class="sidebar  col-2  d-md-block d-none sticky-sidebar">
        <i class="fab fa-twitter"></i>
        <div class="sidebarOption active">
          <span class="material-icons"> home </span>
          <h2>Home</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> search </span>
          <h2>Explore</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> notifications_none </span>
          <h2>Notifications</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> mail_outline </span>
          <h2>Messages</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> bookmark_border </span>
          <h2>Bookmarks</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> list_alt </span>
          <h2>Lists</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> perm_identity </span>
          <h2>Profile</h2>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> <i class="fas fa-sign-out"></i> </span>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>

        </div>
      </div>
      <!-- sidebar ends -->

      <!-- feed starts -->
      <div class="feed full-height col-12 col-lg-6">
        <div class="feed__header">
          <h2>Home</h2>
        </div>

        <!-- tweetbox starts -->
        <div class="tweetBox">
            @livewire('create-new-post')
        </div>
        <!-- tweetbox ends -->

        @livewire('post-interactions')
      </div>
      <!-- feed ends -->

      <!-- widgets starts -->
      <div class="widgets  col-3 d-lg-block sticky-sidebar d-none">
        <div class="widgets__input">
          <span class="material-icons widgets__searchIcon"> search </span>
          <input type="text" placeholder="Search Twitter" />
        </div>

        <div class="widgets__widgetContainer">
          <h2>What's happening?</h2>
          <blockquote class="twitter-tweet">
            <p lang="en" dir="ltr">
              Sunsets don&#39;t get much better than this one over
              <a href="https://twitter.com/GrandTetonNPS?ref_src=twsrc%5Etfw">@GrandTetonNPS</a>.
              <a href="https://twitter.com/hashtag/nature?src=hash&amp;ref_src=twsrc%5Etfw">#nature</a>
              <a href="https://twitter.com/hashtag/sunset?src=hash&amp;ref_src=twsrc%5Etfw">#sunset</a>
              <a href="http://t.co/YuKy2rcjyU">pic.twitter.com/YuKy2rcjyU</a>
            </p>
            &mdash; US Department of the Interior (@Interior)
            <a href="https://twitter.com/Interior/status/463440424141459456?ref_src=twsrc%5Etfw">May 5, 2014</a>
          </blockquote>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
          </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
          </script>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          @livewireScripts
        </div>
      </div>
      <!-- widgets ends -->
    </div>
  
</body>

</html>