<template>
    <b-list-group>
        <contact-component 
            v-for="chat in filteredChats" :key="chat.id"
            :chat="chat"
            :selected="isSelected(chat)"
            @click.native="selectChat(chat)"
        >
        </contact-component>
    </b-list-group> 
</template>

<script>
    export default {
        methods : {
            selectChat(chat) {
                this.$store.dispatch('getMessages', chat)
            },
            isSelected(chat) {
                return this.selectedChat ? this.selectedChat.id === chat.id : false
            }
        },
        computed: {
            selectedChat() {
                return this.$store.state.selectChat
            },
            filteredChats() {
                return this.$store.getters.filteredChats
            }
        }
    }
</script>
