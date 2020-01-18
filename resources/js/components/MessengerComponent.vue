<template>
    <b-container fluid style="height: calc(100vh - 96px);">
        <b-row class="h-100" no-gutters>
            <b-col cols="4">
                <contact-form-component/> 
                <contact-list-component/>
            </b-col>

            <b-col cols="8">
                <active-chat-component v-if="selectedChat"/>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    props: {
        user: Object
    },
    mounted() {
        this.$store.commit('setUser', this.user)
        this.$store.dispatch('getChats')

        Echo.private(`users.${this.user.id}`)
            .listen('MessageSentEvent', (e) => {
                const message         = e.message
                message.written_by_me = false
                this.$store.commit('addMessage', message)
        })

        Echo.join('messenger')
            .here((users) => {
                users.forEach((user) => this.changeStatus(user, true))
            })
            .joining((user) => this.changeStatus(user, true))
            .leaving((user) => this.changeStatus(user, false))
    },
    methods: {
        changeStatus(user, status) {
            const index = this.$store.state.chats.findIndex((chats) => {
                return chats.contact_id == user.id
            })
            if(index >= 0) this.$set(this.$store.state.chats[index], 'online', status)
        }
    },
    computed: {
        selectedChat() {
            return this.$store.state.selectedChat
        }
    }
}
</script>
