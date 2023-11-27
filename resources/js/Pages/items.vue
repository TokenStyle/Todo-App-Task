<template>
    <ul v-for="item in $page.props.items" class="list-group rounded-0">
        <itemElement
            :item="item"
            />
    </ul>
</template>

<script>
import itemElement from './itemElement.vue'

export default {
    components: {
        itemElement
    },
};
</script>