<template>
    <span>
        <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="http://placeimg.com/80/80" alt="..." style="padding-right: 5px">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading" style="margin-bottom: 2px">@{{ comment.user.name }} said...</h4>
                        <p style="margin-bottom: 2px">
                          @{{comment.body}}
                        </p>
                        <span style="color: #aaa;">on @{{comment.created_at}}</span>
                      </div>
    </span>
</template>

<script>
    export default {
        props: ['comment']
    }
</script>
