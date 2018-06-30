<template>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Meet Name:</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select">
                        <select name="track_meet_name_id" v-model="selected">
                            <option
                                v-for="item in items"
                                :value="item.id">{{item.name}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                // oldName: name,
                selected: this.name.name,

                items: []
            }
        },

        created () {
            axios.get('/track/meet/names')
                .then((response) => {
                    this.items = response.data
                });
        }
    }
</script>