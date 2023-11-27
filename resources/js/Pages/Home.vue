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

                        <ul v-for="item in $page.props.items" :ref="setItemRef" class="list-group rounded-0">
                            <li class="list-group-item border-0 d-flex justify-content-between">
                                <span v-show="!showEdit(item.id)" v-on:click="edit(item.id)">{{ item.name }}</span>
                                <input v-show="showEdit(item.id)" v-on:blur="edirBlur" v-on:submit="" />
                                <button type="submit" v-on:click="deleteItem(item.id)" class="btn-secondary">X</button>
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
            itemEdit: {
                id: -1,
                value: '',
            },
            itemRefs: [],
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
        },
        beforeUpdate() {
            this.itemRefs = []
        },
        update(id, v) {
            router.put(`/item/${id}`,
            {
                'name': v,
            });
        },
        deleteItem(id) {
            router.delete(`/item/${id}`);
        },
        edit(id){
            this.itemEdit.id = id;
        },
        edirBlur(){
            this.itemEdit.id = -1;
        },
        showEdit(id){
            return (this.itemEdit.id == id);
        },
        setItemRef(item) {
            this.itemRefs.push(item);
        },
    }
};
</script>