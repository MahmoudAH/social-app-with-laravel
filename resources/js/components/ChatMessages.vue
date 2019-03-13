<template>
  
    
      <section>
            <div v-for="message in messages" :class="[message.user.id == user.id ? 'outgoing_msg' : 'incoming_msg']">
              <div class="incoming_msg_img" v-if="message.user.id !== user.id"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div :class="[message.user.id == user.id ? 'sent_msg' : 'received_msg']">
                <div  :class="[message.user.id == user.id ? 'sent_msg' : 'received_withd_msg']">
                  <p>{{ message.message }}</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            
    </section>
   

</template>

<script>
  export default {
    props: ['messages','user'],
    data(){
      return{
       classn:'primary-font '

      }
    },

  };
</script>