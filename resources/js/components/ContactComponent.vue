<template>
    <b-list-group-item :variant="variant" href="JavaScript:;" class="border-right-0 border-left-0">
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3">
                <b-img :src="chat.contact_picture" width="60" height="60" class="m-1" rounded="circle"/>
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
                <p class="mb-1">
                    <status-component :online="chat.online"></status-component>
                     {{ chat.contact_name }}
                </p>
                <p class="text-muted small mb-1">{{ chat.last_message }}</p>
            </b-col>
            <b-col cols="3" align-self="center" class="d-none d-md-block">
                <p class="text-muted small">{{ timeAgo }}</p>
            </b-col>  
        </b-row>
    </b-list-group-item>
</template>

<script>
    export default {
        props: {
            chat:    Object,
            selected: Boolean
        },
        computed: {
            timeAgo() {
                return moment(this.chat.last_time, 'YYYY-MM-DD hh:mm:ss').local().fromNow()
            },
            variant() {
                return this.selected ? 'secondary' : '' 
            }
        }
    }
</script>
