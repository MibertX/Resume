<section id="about-me-section" class="landing-section">
    <div class="row">
        <div class="col-12 align-center">
            <h2 class="section-title">About me</h2>
            <div class="section-title-underline"></div>
        </div>

        <div class="col-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
            <p id="about-me-text">
                {{$user->about_text}}
            </p>
        </div>
    </div>
</section>

<section id="user-card-section" class="landing-section">
    <div class="carousel-shadow-transparent"></div>
    <div id="user-card-anchor"></div>
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <div id="user-card">
                <div class="row">
                    <div class="col-6">
                        <img id="user-card-photo" src="{{$user->photo}}" alt="My Photo">
                    </div>

                    <div id="user-card-info" class="col-6">
                        <ul>
                            <li><strong>Name: </strong>{{$user->name}}</li>
                            <li><strong>Age: </strong>{{$user->age}} years</li>
                            <li><strong>Location: </strong>{{$user->location}}</li>
                            <li><strong>Email: </strong>{{$user->email}}</li>
                            @if ($user->skype)
                                <li><strong>Skype: </strong>{{$user->skype}}</li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-12">
                        <div id="user-card-social" >
                            <a href="{{$user->linked_in}}"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
