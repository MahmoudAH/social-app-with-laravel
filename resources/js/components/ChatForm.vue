<template>
      <section>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" name="message"  placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage" @keydown="isTyping"  required>

              <button class="msg_send_btn" type="button" @click="sendMessage"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
          </div>
           
         <div>
          <span v-show="typing" class="help-block" style="font-style: italic;">
                            {{ man.name }} is <span 
                            style="color:green">typing...</span>
          </span>
        </div>
      </section>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                typing:false,
                man: ''
            }
        },
        created() {
          let _this = this;

          Echo.private('chat')
            .listenForWhisper('typing', (e) => {
              this.man = e.user;
              this.typing = e.typing;

              // remove is typing indicator after 0.9s
              setTimeout(function() {
                _this.typing = false
              }, 900);
            });
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            },
            isTyping() {
              let channel = Echo.private('chat');

              setTimeout(function() {
                channel.whisper('typing', {
                  user: Laravel.user,
                  typing: true
                });
              }, 300);
            },
        }    
    }
</script>