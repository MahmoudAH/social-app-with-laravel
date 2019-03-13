<template>
    <span>
        <textarea @keyup.enter="postComment(post)" class="form-control" rows="3" name="body" placeholder="Write a  comment" v-model="commentBox" style="margin-top:5px;
                     height: 50px">
        </textarea>
    </span>
</template>

<script>
    export default {
        props: ['post','user'],

        data: function() {
            return {
                commentBox: '',
                comments: [],
            }
        },

        methods: {
          postComment(post) {
            axios.post('/api/posts/'+post+'/comment', {
            api_token: this.user.api_token,
            body: this.commentBox
          })
          .then((response) => {
            this.comments.unshift(response.data);
            this.commentBox = '';
            console.log('congrat');
          })
          .catch((error) => {
            console.log(error);
          })

         },

        }
    }
</script>
