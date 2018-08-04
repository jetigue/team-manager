<div class="menu">
    <p>Dashboard</p>

	<menu-items>
        {{--<template slot="label">Team Properties</template>--}}
        <menu-item url="/cross-country/meets">Meets</menu-item>
        <menu-item @click="toggleSubMenu">Meet Properties</menu-item>
        <menu-item>
            <menu-items>
                <menu-item url="/athletes">Athletes</menu-item>
                <menu-item url="/athletes">Athletes</menu-item>
            </menu-items>
        </menu-item>
        <menu-item url="/cross-country/meet/names">Names</menu-item>
    </menu-items>

</div>