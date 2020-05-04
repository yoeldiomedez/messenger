<template>
    <b-container>
        <b-row class="justify-content-md-center mt-3">
            <b-col cols="8" >
                <b-form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" v-model="csrf"/>

                    <b-form-group label="E-mail">
                        <b-form-input
                        name="email"
                        type="email"
                        v-model="user.email"
                        disabled/>
                    </b-form-group>

                    <b-form-group label="Name">
                        <b-form-input
                        name="name"
                        type="text"
                        v-model="user.name"
                        required/>
                    </b-form-group>

                    <b-form-group label="Change Password">
                        <b-form-input
                        name="password"
                        type="password"
                        />
                    </b-form-group>

                    <b-form-group label="Profile Image">
                        <b-img 
                        :src="picture" 
                        width="60" 
                        height="60" 
                        class="m-1" 
                        rounded="circle" 
                        alt="Current Profile Image" 
                        title="Current Profile Image"/>

                        <b-form-file
                        name="picture"
                        accept=".jpg, .jpeg, .png, .gif"
                        disabled/>
                    </b-form-group>
                    
                    <b-button type="submit" variant="primary">Submit</b-button>
                </b-form>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
  export default {
    props: {
        user: Object,
        csrf: String
    },
    data() {
      return { 

      }
    },
    computed: {
      picture() {
        // return `/users/${this.user.picture}`
        return this.user.picture
      }
    }
  }
</script>