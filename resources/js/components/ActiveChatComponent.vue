<template>
    <b-row class="h-100" no-gutters>
        <b-col cols="8">
            <b-card
                no-body
                footer-bg-variant="light"
                title=""
                class="h-100 border-top-0"
            >
            <b-card-body class="card-body-scroll">
                <message-chat-component 
                    v-for="message in messages" 
                    :key="message.id"
                    :written-by-me="message.written_by_me"
                    :picture="message.written_by_me ? myPicture : selectedChat.contact_picture"
                >
                    {{ message.content }}
                </message-chat-component>
            </b-card-body>
            <div slot="footer">
                <b-form class="my-3 mx-2" @submit.prevent="postMessage" autocomplete="off">
                    <b-input-group class="mt-3">
                        <b-form-input v-model="newMessage" type="text" placeholder="Send a message" required/>
                        <b-input-group-append>
                            <b-button type="submit" variant="primary">Send <i class="fa fa-paper-plane"></i></b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form>
            </div>
            </b-card>
        </b-col>
        <b-col cols="4" class="pt-3 pl-3">
            <b-row align-h="center" class="pb-3">
                <b-col cols="12" md="4">
                    <b-img :src="selectedChat.contact_picture" width="60" height="60" class="m-1" rounded="circle"/>
                </b-col>
                <b-col cols="8" align-self="center" class="d-none d-md-block">
                    <p class="mb-1">{{ selectedChat.contact_name }}</p>
                    <p class="text-muted small mb-1">Active 23m ago</p>
                </b-col>
            </b-row>
            <b-row class="border-top">
                <b-col cols="12" class="mt-4">
                    <b-form-checkbox>
                        Mute Notifications
                    </b-form-checkbox>
                </b-col>
            </b-row>
            
        </b-col>
    </b-row>
</template>
<style>
.card-body-scroll {
    max-height: calc(100vh - 135.5px);
    overflow-y: auto;
}
</style>

<script>
    export default {
        data () {
            return {
                newMessage: ''
            }
        },
        methods: {
            postMessage() {
                this.$store.dispatch('postMessage', this.newMessage)
                           .then( this.newMessage = '' )
            },
            scrollToBottom() {
                const el     = document.querySelector('.card-body-scroll')
                el.scrollTop = el.scrollHeight
            }
        },
        computed: {
            messages() {
                return this.$store.state.messages
            },
            selectedChat() {
                return this.$store.state.selectedChat
            },
            myPicture() {
                return `/users/${this.$store.state.user.picture}`
            },
        },
        updated() {
            this.scrollToBottom()
        }
    }
</script>
