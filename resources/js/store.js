import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      messages: [],
      selectedChat: null,
      chats: [],
      querySearch: '',
      user: null
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        },
        newMessagesList(state, messages) {
            state.messages = messages
        },
        addMessage(state, message) {
            const chat = state.chats.find( (chat) => {
                return chat.contact_id == message.from_id || 
                        chat.contact_id == message.to_id
            })
            const author      = state.user.id === message.from_id ? 'You' : chat.contact_name
            chat.last_message = `${author}: ${message.content}`
            chat.last_time    = message.created_at

            if (
                state.selectedChat.contact_id == message.from_id ||
                state.selectedChat.contact_id == message.to_id
            ) {
               state.messages.push(message) 
            }  
        },
        selectedChat(state, chat) {
            state.selectedChat = chat
        },
        newQuerySearch(state, querySearch) {
            state.querySearch = querySearch
        },
        newChatList(state, chats) {
            state.chats = chats
        }
    },
    actions: {
        getMessages(context, chat){
            axios.get(`/api/messages?contact_id=${chat.contact_id}`)
                 .then(
                     response => {
                        context.commit('selectedChat', chat)
                        context.commit('newMessagesList', response.data)
                    }
                 )
        },
        getChats(context) {
            axios.get('/api/chats').then((response) => {
                context.commit('newChatList', response.data)
            });
        },
        postMessage(context, newMessage) {
            const params = {
                to_id:   context.state.selectedChat.contact_id,
                content: newMessage
            }

            axios.post('/api/messages', params)
                 .then((response) => {
                if (response.data.success) {
                    newMessage            = ''
                    const message         = response.data.message
                    message.written_by_me = true
                    context.commit('addMessage', message)
                }
            });
        }
    },
    getters: {
        filteredChats(state) {
            return state.chats.filter(
                (chat) => chat.contact_name.toLowerCase().includes(state.querySearch.toLowerCase())
            )
        },
    }
})