<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                name: this.attributes.name,
                city: this.attributes.city,
                state: this.attributes.state

            };
        },

        methods: {
            update() {
                axios.patch('/track/venues/' + this.attributes.id, {
                    name: this.name,
                    city: this.city,
                    state: this.state
                });

                this.editing = false;

                flash('Venue name updated');
            },

            destroy() {
                axios.delete('/track/venues/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The track venue has been deleted.');
                });
            }
        }
    }
</script>