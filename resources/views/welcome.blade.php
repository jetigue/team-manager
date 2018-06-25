@extends('layouts.main')

@section('content')
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-10">
            <div class="tile">
                <div class="tile is-parent is-8">
                    <article class="tile is-child box">
                        <div class="content announcements">
                            <h4>Sign-Up for the 2018 Cross Country Season!</h4>
                            <p>All <strong>new</strong> and <strong>returning</strong> runners will need to sign up for
                                the 2018 season by completing the registration form below. Registering will ensure that
                                you are added to the roster and that you are added to the email distribution list.</p>
                            <p class="has-text-centered has-text-weight-bold"><a
                                        href="https://drive.google.com/open?id=1vt4fsS3plVWc6dW3XkcBxWP256HVVQc8A9PTsamQDQU">2018
                                    Team Registration Form</a></p>
                            <h4>Change in Summer Practice Schedule</h4>
                            <p>Please note that the first summer practice will not take place until Tuesday, June 12th,
                                instead of the 5th as was previously listed. We will meet at Chattahoochee Pointe Park
                                at 6:30am that week (the 12th, 13th, and 14th).</p>
                        </div>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box content">
                        <h4 class="has-text-centered">2018 Team Camp</h4>
                        <hr class="my-2" style="border-top: 2px solid #73000A">
                        <p>Hope you can join us for this year's team camp, which will be from Monday, July 16th to
                            Friday July 20th! This year we will be providing transportation to and from camp! Click on
                            the link for more information and to sign up:</p>
                        <p class="has-text-centered has-text-weight-bold"><a
                                    href="{{url('https://longhorndistance.com/team_camp')}}">2018 Team Camp</a></p>
                    </article>
                </div>
            </div>
            <div class="tile">
                <div class="tile is-parent">
                    <div class="tile is-child box content">
                        <h4 class="has-text-centered">2018 Longhorn 5k</h4>
                        <hr class="my-2" style="border-top: 2px solid #73000A">
                        <p>The 10th annual Longhorn 5k will take place on Saturday, August 11. The 5k will start at 8:00
                            am and the 1-mile fun run will take place at 9:15 am.</p>
                        <p>This year's race will take place at Chattahoochee Pointe Park due to the construction going
                            on at the school.</p>
                        <p>More information coming soon!</p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box content">
                        <h4 class="has-text-centered">Lambert River Run</h4>
                        <hr class="my-2" style="border-top: 2px solid #73000A">
                        <p>This year's Lambert River Run will take place on Saturday, August 25th.</p>
                        <p>Last year was a huge success and we are looking forward to some great competition again this
                            year!</p>
                        <p class="has-text-centered has-text-weight-bold"><a
                                    href="http://ga.milesplit.com/meets/311292/info#.WwtxpUgvyHs">Meet Page</a></p>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box content">
                        <h4 class="has-text-centered">Forms and Handouts</h4>
                        <hr class="my-2" style="border-top: 2px solid #73000A">
                        <p><a href="https://www.forsyth.k12.ga.us/page/24881">Physical Form and
                                Information</a></p>
                        <p><a href="https://drive.google.com/open?id=1dQTYcAtR5ruuPmqStV3Fv4tKEwlEmmAn">Information
                                Meeting Quick Sheet</a></p>
                        <p><a href="https://drive.google.com/open?id=1hJUE8Alc8j8YVE_4kycH9STHW1qRVkUc">2018
                                Information Packet</a></p>
                        <p><a href="https://drive.google.com/open?id=10_fwMsHXwNrAyDrgXlcCAdMuG6nADJ2H">2018
                                Meet Schedule (Draft)</a></p>
                    </div>
                </div>
            </div>
            <div class="tile">
                <div class="tile is-parent">
                    <div class="tile is-child box">

                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box">

                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box content">
                        <h4 class="has-text-centered">Stay Connected</h4>
                        <hr class="my-2" style="border-top: 2px solid #73000A">
                        <p>Not receiving emails? Please be sure to register for the 2018 season by completing the form
                            below:</p>
                        <p class="has-text-centered has-text-weight-bold"><a
                                    href="https://drive.google.com/open?id=1vt4fsS3plVWc6dW3XkcBxWP256HVVQc8A9PTsamQDQU">2018
                                Team Registration Form</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tile">
            <div class="tile is-parent">
                <div class="tile is-child box content">
                    <h4 class="has-text-centered">Calendar</h4>
                    <hr class="my-2" style="border-top: 2px solid #73000A">
                    <div class="events">

                        <h5>Summer Practice Begins</h5>
                        <h6>Tuesday, June 12th</h6>
                        <h6><span style="color:#73000a">@ </span>Lambert Track</h6>
                        <h6><span style="color:#73000a">Time: </span>6:30 am</h6>
                        <hr>
                        <h5>Dead Week</h5>
                        <h6>July 1 - July 7</h6>
                        <h6>No Summer Practice</h6>
                        <hr>
                        <h5>Team Camp</h5>
                        <h6>July 16 - July 20</h6>
                        <h6><span style="color:#73000a">@ </span>Berry College</h6>
                        <h6><a href="{{url('https://longhorndistance.com/team_camp')}}">Camp Information</a></h6>
                        <hr>
                        <h5>Official Practice Begins</h5>
                        <h6>Wed, Aug 1st</h6>
                        <hr>
                        <h5>Longhorn 5k/ Time Trial</h5>
                        <h6>Sat, Aug 11th</h6>
                        <h6><span style="color:#73000a">@ </span>Chattahoochee Pointe Park</h6>
                        <h6><span style="color:#73000a">Time: </span>6:00 am</h6>


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection