<template>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2">
        <b-img slot="aside" :src="picture" width="48" height="48" rounded="circle"/>
        <b-card>
            <slot></slot>
        </b-card>
    </b-media>
</template>

<script>
    export default {
        props: {
            writtenByMe: Boolean,
            picture: String
        }
    }
</script>
