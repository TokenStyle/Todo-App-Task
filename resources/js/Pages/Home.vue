<template>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <div class="card-body p-4">

                    <p class="mb-2"><span class="h2 me-2">Todo app</span></p>

                    <form ref="addItem" @submit.prevent="submit" class="d-flex justify-content-center align-items-center mb-4">
                        <div class="form-outline flex-fill">
                            <input v-model="item" type="text" id="form2" class="form-control" placeholder="New task..."/>
                        </div>
                        <button type="submit" :class="[ item ? 'btn-info' : 'btn-dark', 'btn ms-2' ]">Add</button>
                    </form>

                    <ul v-for="item in $page['props'].items" class="list-group rounded-0">
                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="..." checked />
                            {{ item.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3'

export default {
    data() {
        return {
            item: '',
        }
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

            this.item = '';
        }
    }
};
</script>

<style scoped>
    .active {

    }
</style>