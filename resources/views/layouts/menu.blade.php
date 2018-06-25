<div class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="{{ url('athletes')}}">Athletes</a></li>
    </ul>

    <p class="menu-label">
        Meet Attributes
    </p>
    <ul class="menu-list is-active">
        <li><a href="{{ url('meets/genders')}}">Genders</a></li>
        <li><a href="{{ url('meets/divisions')}}">Race Divisions</a></li>
        <li><a href="{{ url('meets/hosts')}}">Hosts</a></li>
        <li><a href="{{ url('meets/timing')}}">Timing Methods</a></li>
    </ul>
    <p class="menu-label">
        Track
    </p>
    <ul class="menu-list">
        <li><a href="{{ url('track/meets')}}">Meets</a></li>
        <li><a href="{{ url('track/meet/names')}}">Meet Names</a></li>
        <li><a href="{{ url('track/venues')}}">Venues</a></li>
        <li><a href="{{ url('track/seasons')}}">Seasons</a></li>
    </ul>
</div>
