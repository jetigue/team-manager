<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,

                meet_name: this.attributes.meet_name.meet_name,
                track_meet_name_id: this.attributes.track_meet_name_id,
                meet_date: this.attributes.meet_date,
                host_id: this.attributes.host_id,
                track_venue_id: this.attributes.track_venue_id,
                timing_method_id: this.attributes.timing_method_id,
                track_season_id: this.attributes.track_season_id,

                host: this.attributes.host.name,
                venue: this.attributes.venue.name,
                timing: this.attributes.timing.name,
                season: this.attributes.season.name,

                showDetails: false

            };
        },

        methods: {
            update() {
                axios.patch('/track/meets/' + this.attributes.id, {
                    track_meet_name_id: this.track_meet_name_id,
                    meet_date: this.meet_date,
                    host_id: this.host_id,
                    track_venue_id: this.track_venue_id,
                    timing_method_id: this.timing_method_id,
                    track_season_id: this.track_season_id,
                });

                this.editing = false;

                flash('Track meet updated');

                location.reload();

            },

            destroy() {
                axios.delete('/track/meets/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The track meet has been deleted.');
                });
            }
        }
    }
</script>