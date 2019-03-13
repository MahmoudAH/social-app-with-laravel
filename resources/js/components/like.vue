<template>
    <span>
        <a href="#" class="card-link" v-if="isFavorited" @click.prevent="unFavorite(post)" style="margin-right:15px">
            <i  class="fa fa-heart" style="color:red;"></i>Like
        </a>
        <a href="#" class="card-link" v-else @click.prevent="favorite(post)" style="margin-right:15px">
            <i  class="fa fa-heart-o"></i>Like
        </a>
    </span>
</template>

<script>
    export default {
        props: ['post', 'favorited'],

        data: function() {
            return {
                isFavorited: '',

            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(post) {
                axios.post('/like/'+post)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(post) {
                axios.post('/unlike/'+post)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
