<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                name: this.attributes.name,

            };
        },

        methods: {
            update() {
                axios.patch('/meets/hosts/' + this.attributes.id, {
                    name: this.name
                });

                this.editing = false;

                flash('Updated!');
            },

            destroy() {
                axios.delete('/meets/hosts/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The host has been deleted.');
                });
            }
        }
    }
</script>