<template>

    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a>Dashboard</a></li>
            <li><a>Customers</a></li>
        </ul>
        <p class="menu-label">
            Admin Menu
        </p>
        <ul class="menu-list">
            <li><a href="/athletes">Athletes</a></li>
            <li>
                <a>Users</a>
                <ul>
                    <li><a href="/users">Users</a></li>
                    <li><a href="/user-roles">User Roles</a></li>
                </ul>
            </li>
            <li>
                <a>General Properties</a>
                <ul>
                    <li><a href="/general-properties/distances">Distances</a></li>
                    <li><a href="/general-properties/seasons">Seasons</a></li>
                    <li><a href="/general-properties/terrain-types">Terrain Types</a></li>
                </ul>
            </li>

            <li>
                <a>Meet Properties</a>
                <ul>
                    <li><a href="/meet-properties/hosts">Hosts</a></li>
                    <li><a href="/meet-properties/timing">Timing Methods</a></li>
                    <li>
                        <a>Cross Country</a>
                        <ul>
                            <li><a href="/cross-country/meet-names">Meet Names</a></li>
                            <li><a href="/cross-country/venues">Meet Venues</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>Track & Field</a>
                        <ul>
                            <li><a href="/track/meet-names">Meet Names</a></li>
                            <li><a href="/track/seasons">Seasons</a></li>
                            <li><a href="/track/venues">Venues</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a>Race Properties</a>
                <ul>
                    <li><a href="/race-properties/divisions">Divisions</a></li>
                    <li><a href="/race-properties/genders">Genders</a></li>
                    <li><a href="/race-properties/cross-country/events">Cross Country Events</a></li>
                    <li><a href="/race-properties/track/events">Track Events</a></li>
                </ul>
            </li>

            <li>
                <a>Training Properties</a>
                <ul>
                    <li><a href="/training-properties/day-times">Day Times</a></li>
                    <li><a href="/training-properties/run-efforts">Run Efforts</a></li>
                    <li><a href="/training-properties/run-feelings">Run Feelings</a></li>
                    <li><a href="/training-properties/run-types">Run Types</a></li>
                </ul>
            </li>
        </ul>
    </aside>

    <!--<div class="menu">-->
        <!--<menu-label>Dashboard</menu-label>-->

        <!--<menu-list>-->
            <!--<menu-list-item url="/athletes">Athletes</menu-list-item>-->
        <!--</menu-list>-->

        <!--<menu-label>Admin Menu</menu-label>-->
        <!--<menu-list>-->
            <!--<menu-list-item>Training Properties</menu-list-item>-->
            <!--<menu-list class="ml-4">-->
                <!--<menu-list-item url="/training-properties/seasons">Seasons</menu-list-item>-->
                <!--<menu-list-item url="/training-properties/">Distances</menu-list-item>-->
                <!--<menu-list-item url="/race-properties/divisions">Divisions</menu-list-item>-->
                <!--<menu-list-item url="#">Track Events</menu-list-item>-->
            <!--</menu-list>-->
        <!--</menu-list>-->

        <!--<menu-label>Cross Country</menu-label>-->
        <!--<menu-list>-->
            <!--<menu-list-item url="/cross-country/meets">Meets</menu-list-item>-->
            <!--<menu-list-item>Team Results</menu-list-item>-->
            <!--<menu-list-item>Individual Results</menu-list-item>-->
        <!--</menu-list>-->

        <!--<menu-label>Track & Field</menu-label>-->
        <!--<menu-list>-->
            <!--<menu-list-item url="/track/meets">Meets</menu-list-item>-->
            <!--<menu-list-item>Team Results</menu-list-item>-->
            <!--<menu-list-item>Individual Results</menu-list-item>-->
        <!--</menu-list>-->

        <!--<menu-label>Training</menu-label>-->
        <!--<menu-list>-->
            <!--<menu-list-item url="/training/time-trials">Time Trials</menu-list-item>-->
        <!--</menu-list>-->
    <!--</div>-->
</template>

<script>
    export default {
        props: [],

        data() {
            return {
            }
        },

        // methods: {
        //     toggleMenu: function() {
        //         this.menuOpen = !this.menuOpen;
        //     }
        // }
    }
</script>