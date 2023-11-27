<template>
    <form ref="addItem" @submit.prevent="submit" class="d-flex justify-content-center align-items-center mb-4">
        <div class="form-outline flex-fill">
            <input v-model="item" type="text" id="form2" class="form-control" placeholder="New task..."/>
        </div>
        <button type="submit" :class="[ item ? 'btn-info' : 'btn-dark', 'btn ms-2' ]">Add</button>
    </form>
</template>

<script>
import { router } from '@inertiajs/vue3'

export default {
    data() {
        return {
            item: '',
        };
    },
    methods: {
        submit() {
            this.$refs.addItem.reset();
            
            router.post("/item/store",
            {
                'item':
                {
                    'name': this.item
                }
            });
        },
    },
};
</script>