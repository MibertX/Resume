<section id="skills-section" class="container-fluid">
    <div class="carousel-shadow-transparent"></div>
    <div class="row">
        <div class="col-12 align-center">
            <h2 class="section-title">Skills</h2>
            <div class="section-title-underline"></div>
        </div>
     </div>

    <div class="container">
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-6 col-md-4">
                    <div class="skillbar-wrapper">
                        <div class="skillbar" data-percent="{{$skill->mastery_in_percent}}">
                            <span class="skillbar-icon">
                                <img src="{{strtolower($skill->icon_path)}}">
                            </span>
                            <span class="skillbar-title">{{$skill->name}}</span>
                            <p class="skillbar-bar"></p>
                            <span class="skill-bar-percent"></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
