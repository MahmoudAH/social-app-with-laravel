@extends('layouts.app')
@section('styles')
<link  href="{{ asset('css/friends.css') }}">
<link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
<style type="text/css">
  body {
            background-color: #eeeeee;
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
        .twPc-div {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #e1e8ed;
            border-radius: 6px;
            height: 220px;
            //*max-width: 340px; // orginal twitter width: 290px;*/
        }
        .twPc-bg {
            background-image: url("https://images.unsplash.com/photo-1506269085878-5c33839927e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
            background-position: 0 50%;
            background-size: 100% auto;
            border-bottom: 1px solid #e1e8ed;
            border-radius: 4px 4px 0 0;
            height: 95px;
            width: 100%;
        }
        .twPc-block {
            display: block !important;
        }
        .twPc-button {
            margin: -35px -10px 0;
            text-align: right;
            width: 100%;
        }
        .twPc-avatarLink {
           
            display: inline-block !important;
            float: left;
            margin: -30px 5px 0 8px;
            max-width: 100%;
            padding: 3px;
            vertical-align: bottom;
        }
        .twPc-avatarImg {
            border: 2px solid #fff;
            border-radius: 7px;
            box-sizing: border-box;
            color: #fff;
            height: 72px;
            width: 72px;
        }
        .twPc-divUser {
            margin: 5px 0 0;
        }
        .twPc-divName {
            font-size: 18px;
            font-weight: 700;
            line-height: 21px;
        }
        .twPc-divName a {
            color: inherit !important;
        }
        .twPc-divStats {
            margin-left: 11px;

            padding: 10px ;
        }
        .twPc-Arrange {
            box-sizing: border-box;
            display: table;
            margin: 0;
            min-width: 100%;
            padding: 0;
            table-layout: auto;
        }
        ul.twPc-Arrange {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }
        .twPc-ArrangeSizeFit {
            display: table-cell;
            padding: 0;
            vertical-align: top;
        }
        .twPc-ArrangeSizeFit a:hover {
            text-decoration: none;
        }
        .twPc-StatValue {
            display: block;
            font-size: 18px;
            font-weight: 500;
            transition: color 0.15s ease-in-out 0s;
        }
        .twPc-StatLabel {
            color: #8899a6;
            font-size: 10px;
            letter-spacing: 0.02em;
            overflow: hidden;
            transition: color 0.15s ease-in-out 0s;
            font-size: 13px;
            font-weight: 500;
            line-height: 21px;
            font-family: 'Lobster', cursive;


        }
</style>
  
<link href="https://fonts.googleapis.com/css?family=Germania+One|Lobster" rel="stylesheet">

@endsection
@section('content')
@include('partials.error')

<div class="container-fluid gedf-wrapper">
  <!-- show flash message -->
<div class="panel-body" style="text-align: center;color: #009688;padding: 0;margin: 0 80px;font-size: 20px">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>

                    @endif
</div> 
        <div class="row">

            <div class="col-md-3">
               <!-- code start -->
               <div class="twPc-div" >
                   <a class="twPc-bg twPc-block"></a>

                <div >
                    
                    <a title="Mert S. Kaplan" href="https://twitter.com/mertskaplan" class="twPc-avatarLink" >
                        <img alt="Mert S. Kaplan" src="images/IMG_20180624_124333176.jpg" style="border-radius: 50%" class="twPc-avatarImg">
                    </a>

                    <div class="twPc-divUser">
                        <div class="twPc-divName">
                            <a href="https://twitter.com/El3okla">Mahmoud Ali</a>
                        </div>
                        <span>
                            <a href="https://twitter.com/mertskaplan">@<span>El3okla</span></a>
                        </span>
                    </div>

                    <div class="twPc-divStats" > 
                        <ul class="twPc-Arrange" >
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                                    <span class="twPc-StatLabel twPc-block">Tweets</span>
                                    <span class="twPc-StatValue">9.840</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                                    <span class="twPc-StatLabel twPc-block">Following</span>
                                    <span class="twPc-StatValue">885</span>
                                </a>
                            </li>
                            <li class="twPc-ArrangeSizeFit">
                                <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                                    <span class="twPc-StatLabel twPc-block">Followers</span>
                                    <span class="twPc-StatValue">1.810</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
               </div>
               <!-- code end -->

                <div class="card" style="margin-top: 30px">
                    <div class="card-body">
                        <div class="h5">{{ucfirst(Auth::user()->name)}}</div>
                        <div class="h7 text-muted">Fullname : Miracles Lee Cross</div>
                        <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                            etc.
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Followers</div>
                            <div class="h5">5.2342</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5">6758</div>
                        </li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                    a publication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li>
                        </ul>
                    </div>
                    <form method="post" @submit.prevent="addPost">
                      
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                
                                <div   :class="['form-group', validationErrors.content ? 'has-error' : '']" >
                                
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"  name="content"  value="form1" v-model="content"></textarea>
                                    <span v-if="validationErrors.content" :class="['label label-danger']">@{{ validationErrors.content[0] }}</span>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="content" value="form2">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary" >share</button>
                            </div>
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- Post /////-->


                
                <!--- \\\\\\\Post-->
                <div class="card gedf-card" style="margin-bottom: 20px" v-for="post,key in posts">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">@{{post.user.name}}</div>
                                    <div class="h7 text-muted">Miracles Lee Cross</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" :href="'posts/'+post.id">Show</a>

                                        <a class="dropdown-item" href="#" @click="openModal(post.id)" 
                                        data-toggle="modal" :data-target="'#exampleModalLong' + post.id"
                                        v-if="post.user.id == {{Auth::user()->id}}">Edit</a>

                                        <a class="dropdown-item" href="#" data-toggle="modal" :data-target="'#deleteModal' + post.id" v-if="post.user.id == {{Auth::user()->id}}">Delete</a>

                                        <a class="dropdown-item" href="#" v-if="post.user.id == {{Auth::user()->id}}">Hide</a>

                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--start delete modal-->
                        <div class="modal fade deleteModal" :id="'deleteModal' + post.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                             </div>
                                             
                                             <div class="modal-body">
                                               <h4>Are you want to delete that post ?!!</h4>

                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                               <button  type="button" class="btn btn-primary btn-lg" @click.prevent="deletePost(post.id)">Delete Post</button>
                                             </div>
                                             
                                           </div>
                                         </div>
                                       </div><!--end delete modal-->
                                       
                                       <!--start edit modal-->
                                       <div class="modal fade editModal" :id="'exampleModalLong' + post.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Edit Post </h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                             </div>
                                        
                                             
                                             <div class="modal-body">
                                              
                                             <div :class="['form-group', validationErrors.title ? 'has-error' : '']">

                                               <label for="title">Title</label>
                                               <input type="text" class="form-control" id="title" placeholder="Title"  name="title" v-model="title">
                                               <span v-if="validationErrors.title" :class="['label label-danger']">@{{ validationErrors.title[0] }}</span>
                                               
                                             </div>

                                             <div :class="['form-group', validationErrors.content ? 'has-error' : '']">
                                               <label for="content">Post Content</label>
                                               <textarea class="form-control" rows="8" id="content" placeholder="Write something amazing..." name="content" v-model="updatedContent" required></textarea>
                                               <span v-if="validationErrors.content" :class="['label label-danger']">@{{ validationErrors.content[0] }}</span>
                                               
                                             </div>

                                             <div class="form-group">
                                               <label class="active">
                                                <input type="checkbox" name="published" style="margin-right: 15px;"  v-model="published" checked>Published
                                              </label>
                                             </div>


                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                               <button type="button" class="btn btn-primary btn-lg" @click.prevent=
                                               " updatePost(post.id)" >Save Post</button>
                                             </div>
                                             
                                           </div>
                                         </div>
                                       </div> <!--end edit modal-->

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>@{{ post.created_at}}</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title" v-if="post.title">@{{post.title}}</h5>
                            <h5 class="card-title" v-else>@{{post.content.substring(0,8)+".." }}</h5>
                            
                        </a>

                        <p class="card-text">
                          @{{post.content.slice(0,200) + "....." }}
                        </p>
                        <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">users who liked on this post</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>
                                 <div class="modal-body">

                                   <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 20px" v-for="like in post.likes">               
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="mr-2" >
                                        <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                      </div>
                                      <div class="ml-2">
                                        <
                                        <div class="h5 m-0" v-if="like.id=={{Auth::user()->id}}"> You
                                        </div>
                                        <div class="h5 m-0" v-else> @{{like.name}}</div>
                                        <div class="h7 text-muted">Miracles Lee Cross
                                        </div>
                                      </div>
                                    </div>
                                    <button class="btn btn-primary pull-right" v-if="like.id !== {{Auth::user()->id}}"><i class="fa fa-user-plus" aria-hidden="true" ></i>
                                    add friend</button>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary"                          data-dismiss="modal">Close</button>
                               </div>
                             </div>
                           </div>
                         </div>
                        
                        
                        <!--post likes count-->
                        <section style="margin-bottom: -20px">
                          
                          <hr style="color: #d9d9f3" v-if="post.likes.length >0">
                          <a href=""   data-toggle="modal" data-target="#exampleModal"  data-id="post.id" v-if="post.likes.length >0">
                           <span > @{{post.likes.length}} <i class="fa fa-heart-o" aria-hidden="true" class="fa fa-heart"  ></i> </span></a>
                           <!-- Button trigger modal -->
                           

                         <hr style="color: #d9d9f3" v-if="post.comments.length >0 && post.likes.length == 0">


                         <a href="" v-if="post.comments.length > 0" class="pull-right" @click.prevent=" commentHidden =! commentHidden" :class="testComment" style="margin-bottom: -20px">
                           <span > @{{post.comments.length}} comment </span></a>

                         </section>
                        
                     </div>
                     
                    <div class="card-footer">
                        
                        <a href="#" class="card-link" v-if="isFavorited" @click.prevent="unFavorite(post.id)" style="margin-right:15px" >
                          <i  class="fa fa-heart" style="color:red;"></i>Like
                        </a>
                        <a href="#" class="card-link" v-else @click.prevent="favorite(post.id,key)" style="margin-right:15px" >
                          <i  class="fa fa-heart-o"></i>Like
                        </a>

                        <a href="#" class="card-link" data-toggle="modal" data-target="#commentOnPost"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>

                    <textarea @keyup.enter="postComment(post.id,key)" class="form-control" rows="3" name="body" placeholder="Write a  comment" v-model="commentBox[key]" style="margin-top:5px;
                     height: 50px">
                    </textarea>

                    <div class="media" style="margin-top:20px;" v-for="comment in post.comments"  v-if="commentHidden">
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
                    </div>
               </div>
            </div>
            <div class="col-md-3">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card gedf-card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script>
     const app = new Vue({
            el: '#app',
            data: {
              commentHidden: false,
              likes: '',
              comments: [],
              commentBox: {},
              posts:[],
              user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
              content:'',
              validationErrors:[],
              isFavorited: '',
              updatedContent:'',
              title:'',
              published:'',
             // favorited:false,
              
            },
            mounted(){
            
             axios.get('/home/posts')
             .then(response => {
              console.log(response); 
              this.posts = response.data; 
              console.log('congrat');
            })
             .catch(function (error) {
              console.log(error); // run if we have error
           });
            this.listen();
            /*
            axios.get('/posts/likes')
             .then((response) => {
                console.log('ok')
             })
             .catch(function (error) {
              console.log(error); // run if we have error
           });*/

            
            //this.isFavorited = this.isFavorite ? true : false;
       
           },
            computed:{
              testComment:function(){

                  return this.commentHidden;
              },
              isLiked(){
                this.posts.forEach(function(post){
                 return post.liked  ? true : false;
                 })
              }
              /*
              isFavorite() {
                //return this.posts.liked ? true: false ;
                return this.favorited;
              },*/

            },
            methods:{
              editPost(){
                console.log('dtfdhygfh');
                $('#exampleModal').modal('show');
              },
              addPost() {
                axios.post('/post/create', {
                  api_token: this.user.api_token,
                  content: this.content
                })
                .then((response) => {
                  //app.posts.unshift(response.data);
                  //console.log(this.posts[0]);
                  this.content = '';
                  if(response.status===200){
                    app.posts = response.data;
                }
                swal('Added!', 'The post has been added.', 'success');
                console.log('ok');
                })
                .catch((error) => {
                  
                  if (error.response.status == 422){
                         this.validationErrors = error.response.data.errors;
                  }
                  console.log(error);
                })
              },
              favorite(id) {
                axios.post('/like/'+id ,{
                    api_token: this.user.api_token
                })
                    .then((response) => {
                      //this.isFavorited = true;
                      console.log(response.data.post);
                      this.posts = response.data
                    })
                    .catch(response => console.log(response.data));
              },

              unFavorite(id,key) {
                axios.post('/unlike/'+id)
                .then((response) => {
                  this.isFavorited = false;
                  this.posts = response.data
                })
                .catch(response => console.log(response.data));
              },
              postComment(post,key) {
                axios.post('/api/posts/'+post+'/comment', {
                  api_token: this.user.api_token,
                  body: this.commentBox[key]
                })
                .then((response) => {
                  if(response.status===200){
                    app.posts = response.data;
                  }
                  this.commentBox[key] = '';
                  console.log('sucess');
                })
                .catch((error) => {
                  console.log(error);
                })

              },
              openModal(id){
                //$("#exampleModalLong").modal('show');
                axios.get('/post/modal/' + id)
                             .then(response => {
                              console.log(response.data); 
                              this.title = response.data[0];
                              this.updatedContent = response.data[1];

                              console.log('congrat');
                              })
                             .catch((error) => {
                              console.log(error);
                             });
               
              },
              updatePost(id){
                axios.post('/updatePost/' + id, {
                  api_token : this.user.api_token,
                  content : this.updatedContent,
                  title : this.title,
                  published : this.published,
                })
                .then((response) => {

                  if(response.status===200){
                      app.posts = response.data;
                  }
                  $(".editModal").modal('hide');
                  swal('Updated!', 'The post has been updated.', 'success');
                })
                .catch((error) => {
                    if (error.response.status == 422){
                         this.validationErrors = error.response.data.errors;
                    }
                    console.log(error);
                })
              },
              deletePost(id){
                axios.delete('/posts/' + id + '/delete',{
                    api_token : this.user.api_token,
                })
                .then((response) => {
                    if(response.status===200){
                      app.posts = response.data;
                    }
                    $(".deleteModal").modal('hide');
                    swal('Deleted!', 'The post has been deleted.', 'success');
                })
                .catch((error) => {
                    console.log(error);
                })
              },
              
             listen() {
                Echo.channel('new-post')
                .listen('NewPost', (event) => {
                    console.log(event);
                    console.log('new post');
                
              })
             }
            }
          });

        </script>
@endsection
