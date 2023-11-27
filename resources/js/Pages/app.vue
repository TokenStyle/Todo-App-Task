<template>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <p class="mb-2"><span class="h2 me-2">Todo app</span></p>
                        <h6>Click on todos to edit. Press X to remove todo</h6>

                        <add-item-form />

                        <items />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import addItemForm from './addItemForm.vue'
import items from './items.vue'

export default {
    components: {
        addItemForm,
        items,
    },
};
</script>