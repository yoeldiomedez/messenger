<template>
    <b-input-group class="my-3 px-2">
        <b-input-group-text slot="append" class="bg-transparent">
            <i class="fa fa-search"></i>
        </b-input-group-text>
        <b-form-input v-model="querySearch" class="border-right-0" placeholder="Search Messenger"/>
    </b-input-group>  
</template>

<script>
export default {

    computed: {
        querySearch: {
            get () {
                return this.$store.state.querySearch
            },
            set (querySearch) {
                this.$store.commit('newQuerySearch', querySearch)
            }
        }
    }
}
</script>
