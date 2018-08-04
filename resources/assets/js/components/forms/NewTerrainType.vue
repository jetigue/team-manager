<template>
    <form action="/api/general-properties/terrains" method="POST" id="newTerrainType" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Terrain Name</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="terrainNameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="name">Description</label>
            <div class="control">
                <textarea class="textarea" name="description" v-model="form.description" rows="2" required></textarea>
                <span id="descriptionHelp" class="help is-danger" v-if="form.errors.has('description')"
                      v-text="form.errors.get('description')"></span>
            </div>
        </div>
        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Terrain Type</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    description: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                .post('/api/general-properties/terrains')

                    .then(data => {

                        Event.$emit('formSubmitted');

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'New Terrain Type Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            },
        }
    }
</script>