

<template>
  
    
      <section>
            <div class="incoming_msg" v-for="message in messages"   v-if="message.user.id !== user.id">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{ message.message }}</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg" v-for="message in messages"  v-if="message.user.id == user.id">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="sent_msg">
                <p>{{ message.message }}</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
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