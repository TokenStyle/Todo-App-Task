<template>
    <li class="list-group-item border-0 d-flex justify-content-between">
        <label :for="'itemName'+item.id" v-show="showEdit()" v-on:click="edit()">{{ item.name }}</label>
        <input :name="'itemName'+item.id" :id="'itemName'+item.id" ref="input" v-show="!showEdit()" v-model="itemEdit" v-on:blur="update(item.id)" class="w-75" />
        <button type="submit" v-on:click="deleteItem(item.id)" class="btn-secondary">X</button>
    </li>
</template>

<script>
import { tSExpressionWithTypeArguments } from '@babel/types';
import { router } from '@inertiajs/vue3'

export default {
    props: ['item'],

    setup(props) {
        return {
            props: props,
        };
    },

    data() {
        return {
            itemEdit: '',
            isBlur: true,
            itemFirstValue: '',
        }
    },
    
    methods: {
        update(id) {
            if (this.itemEdit == this.props.item.name)
                return this.stopEdit();
                

            router.put(`/item/${id}`,
            {
                'item': {
                    'name': this.itemEdit,
                },
            });
        },
        deleteItem(id) {
            router.delete(`/item/${id}`);
        },
        edit(){
            this.itemEdit = this.props.item.name;
            this.isBlur = false;
            this.$refs.input.focus();
        },
        stopEdit(){
            this.isBlur = true;
        },
        showEdit(){
            return this.isBlur;
        },
    },
};
</script>