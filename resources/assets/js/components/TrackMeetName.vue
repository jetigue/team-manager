<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                meet_name: this.attributes.meet_name,

            };
        },

        methods: {
            update() {
                axios.patch('/track/meet/names/' + this.attributes.id, {
                    meet_name: this.meet_name
                });

                this.editing = false;

                flash('Meet Name Updated!');
            },

            destroy() {
                axios.delete('/track/meet/names/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The meet name has been deleted.');
                });
            }
        }
    }
</script>