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
                axios.patch('/meets/genders/' + this.attributes.id, {
                    name: this.name
                });

                this.editing = false;

                flash('Updated!');
            },

            destroy() {
                axios.delete('/meets/genders/' + this.attributes.id);

                $(this.$el).fadeOut(500, () => {
                    flash('The gender name has been deleted.');
                });
            }
        }
    }
</script>