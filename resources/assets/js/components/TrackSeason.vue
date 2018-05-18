<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                name: this.attributes.name

            };
        },

        methods: {
            update() {
                axios.patch('/track/seasons/' + this.attributes.id, {
                    name: this.name
                });

                this.editing = false;

                flash('Season name updated');
            },

            destroy() {
                axios.delete('/track/seasons/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The season has been deleted.');
                });
            }
        }
    }
</script>