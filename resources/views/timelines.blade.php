@foreach($timelineItemsByType as $type=>$timelineItems)
    @if ($type == 'work')
        @php ($sectionId = 'work-experience-section')
        @php ($sectionTitle = 'Work Experience')
    @elseif ($type == 'education')
        @php ($sectionId = 'education-section')
        @php ($sectionTitle = 'Education')
    @else
        @continue
    @endif

    <section id="{{$sectionId}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 align-center">
                    <h2 class="section-title">{{$sectionTitle}}</h2>
                    <div class="section-title-underline"></div>
                </div>

                <div class="col-12">
                    <div class="timeline">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                                @foreach($timelineItems as $timelineItem)
                                    <div class="timeline__item">
                                        <div class="timeline__content">
                                            <h2 class="timeline-title">{{$timelineItem->title}}</h2>
                                            <h2 class="timeline-period">{{$timelineItem->formatted_period_date}}</h2>
                                            <p class="timeline-text">{{$timelineItem->text}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach