<template>
    <i 
        :class="online ? 'fa fa-circle text-success' : 'fa fa-circle text-dark'"
        :title="online ? 'Active' : 'Disconected'"
    >
    </i>
</template>

<script>
export default {
    props: {
        online: Boolean,
    }
}
</script>

