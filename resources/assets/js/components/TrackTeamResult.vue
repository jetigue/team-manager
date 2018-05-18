<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                name: this.attributes.meet_name,

                showDetails: false

            };
        },

        methods: {
            update() {
                axios.patch('/track/team/results/' + this.attributes.id, {
                    name: this.name
                });

                this.editing = false;

                flash('Team result updated');
            },

            destroy() {
                axios.delete('/track/team/results/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The team result has been deleted.');
                });
            }
        }
    }
</script>