<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>eSchool</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script>
    Twilio.Video.createLocalTracks({
       audio: true,
       video: { width: 300 }
    }).then(function(localTracks) {
       return Twilio.Video.connect('{{ $accessToken }}', {
           name: '{{ $roomName }}',
           tracks: localTracks,
           video: { width: 300 }
       });
    }).then(function(room) {
       console.log('Successfully joined a Room: ', room.name);

       room.participants.forEach(participantConnected);

       var previewContainer = document.getElementById(room.localParticipant.sid);
       if (!previewContainer || !previewContainer.querySelector('video')) {
           participantConnected(room.localParticipant);
       }

       room.on('participantConnected', function(participant) {
           console.log("Joining: '"  + participant.identity +  "'");
           participantConnected(participant);
       });

       room.on('participantDisconnected', function(participant) {
           console.log("Disconnected: '" +  participant.identity  + "'");
           participantDisconnected(participant);
       });
    });
    // additional functions will be added after this point
    function participantConnected(participant) {
       console.log('Participant "%s" connected', participant.identity);

       const div = document.createElement('div');
       div.id = participant.sid;
       div.setAttribute("style", "float: left; margin: 10px;");
       div.innerHTML = "<div style='clear:both'>" + participant.identity + "</div>";

       participant.tracks.forEach(function(track) {
           trackAdded(div, track)
       });

       participant.on('trackAdded', function(track) {
           trackAdded(div, track)
       });
       participant.on('trackRemoved', trackRemoved);

       document.getElementById('media-div').appendChild(div);
    }

    function participantDisconnected(participant) {
       console.log('Participant "%s" disconnected', participant.identity);

       participant.tracks.forEach(trackRemoved);
       document.getElementById(participant.sid).remove();
    }

    function trackAdded(div, track) {
       div.appendChild(track.attach());
       var video = div.getElementsByTagName("video")[0];
       if (video) {
           video.setAttribute("style", "max-width:300px;");
       }
    }

    function trackRemoved(track) {
       track.detach().forEach( function(element) { element.remove() });
    }
</script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
