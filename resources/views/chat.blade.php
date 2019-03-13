@extends('layouts.app')
@section('styles')
    <link rel="stylesheet"  href="{{asset('css/chat.css')}}">

    <link rel="stylesheet"  href="{{asset('css/chat2.css')}}">
@endsection

@section('content')
@include('partials.error')

<div class="container-fluid" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-6">
            <h4 style="padding: 20px"><i class="fa fa-commenting" aria-hidden="true"></i>
            Now you can chat with other users...</h4>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-3">
            <div class="panel panel-default user_panel">

            <div class="panel-heading">
                <h3 class="panel-title">active now</h3>
            </div>
            <h4 style="margin-left: 20px" id="no-online-users"> no online users</h4>
            <div class="panel-body">
                <div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody id="onlineusers">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <ul class="list-group" id="online-users">
        </ul>
    </div>
    <div class="col-md-8 ">
        <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <div class="mesgs">
          <div class="msg_history">
            <chat-messages :messages="messages" :user="{{ Auth::user() }}">
                
            </chat-messages>
            
          <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}">              
          </chat-form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
	const app = new Vue({
    el: '#app',
    data: {
        messages: [],
        
    },

    mounted() {
        this.fetchMessages();
        this.listen();
    },
    methods: {
        fetchMessages() {
            axios.get('/messages')

            .then(response => {
                this.messages = response.data;
            })
            .catch(function (error) {
                  console.log(error);
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message)

            .then(response => {
              console.log(response.data);
            })
            .catch(function (error) {
                  console.log(error);
            });
        },
        listen(){
    	    Echo.private('chat')
    	     .listen('MessageSent', (e) => {
    		    this.messages.push({
    			    message:e.message.message,
    		        user:e.user,
    		    });
    	    });
            Echo.join(`online`)
                .here((users) => {
                    
                    if(users.length  > 1){
                     $('#no-online-users').css('display','none')


                    }

                    let  userId = $('meta[name=user-id]').attr("content");

                    users.forEach(function(user){
                        if(userId == user.id){
                            return;
                        }
                        $('#onlineusers').append(`
                            <tr id="user-${user.id}">
                                <td width="10">
                                    <img class="pull-left img-circle nav-user-photo" width="50" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" />  

                                </td>
                                <td>
                                <a href="" style="">   
                                   <strong >
                                    ${user.name}
                                    </strong> <br>
                                    
                                  </a>
                                    <small>online
                                    </small>
                                  </td>
                                
                                <td align="center">

                                    <i class="fa fa-circle" aria-hidden="true" style="
                                    color: green"></i><br>
                                </td>
                            </tr>
                            `);

                    });
                    console.log(users);
                })
                .joining((user) => {

                    $('#no-online-users').css('display','none');

                    $('#onlineusers').append(`
                            <tr id="user-${user.id}">
                                <td width="10">
                                    <img class="pull-left img-circle nav-user-photo" width="50" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" />  
                                </td>
                                <td>
                                <a href="" style="">   
                                   <strong >
                                    ${user.name}
                                    </strong> <br>
                                    
                                  </a>
                                    <small>online
                                    </small>
                                  </td>
                                
                                <td align="center">

                                    <i class="fa fa-circle" aria-hidden="true" style="
                                    color: green"></i><br>
                                </td>
                            </tr>
                            `);
                    console.log(user.name);
                })
                .leaving((user) => {
                    $('#user-' + user.id).remove();
                    $('#no-online-users').css('display','block');
                    
                });
        }
    } 
});
</script>
@endsection