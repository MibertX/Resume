<section id="feedback-section" class="landing-section">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-xl-6 offset-xl-2">
            <div class="container-fluid">
                <h3>Leave Message</h3>
                <form id="feedback-form" method="POST" enctype="multipart/form-data" action="{{route('storeFeedback')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <input type="text" class="form-input" placeholder="Name*" name="username">
                                </div>

                                <div class="col-12 col-md-6 col-lg-12">
                                    <input type="email" class="form-input" placeholder="Email*" name="email">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-input" placeholder="Subject*" name="subject">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <textarea placeholder="Message*" class="form-textarea" name="text" rows="7"></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit">Hire Me</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-sm-10 offset-sm-1 offset-xl-0 col-xl-2">
            <div id="feedback-social">
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-12 social-item-container">
                        <div class="social-icon-wrapper">
                            <i class="fas fa-map-marker-alt fa-3x"></i>
                        </div>
                        <div class="social-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Location</h3>
                                </div>

                                <div class="col-12">
                                    <p>{{$user->location}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-xl-12 social-item-container">
                        <div class="social-icon-wrapper">
                            <i class="far fa-envelope fa-3x"></i>
                        </div>
                        <div class="social-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Email</h3>
                                </div>
                                <div class="col-12">
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-xl-12 social-item-container">
                        <div class="social-icon-wrapper">
                            <i class="fab fa-skype fa-3x"></i>
                        </div>
                        <div class="social-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Skype</h3>
                                </div>
                                <div class="col-12">
                                    <p>{{$user->skype}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
