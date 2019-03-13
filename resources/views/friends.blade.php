@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/friends.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- show flash message -->
<div class="panel-body" style="background-color: #ffcdd2;text-align: center;color: #009688;padding: 0;margin: 0 80px;font-size: 20px">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
</div>
<!--show requsts-->
  @if(Auth::user()->friendOf()->count() > 0)
<div class="container" style="margin-bottom: 20px">
  <div class="col-md-8"style="background-color: #fff">
    <h2 class="subheader">friend requests</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach(Auth::user()->friendOf as $request)
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </div>
            
            <div style="float: right;margin-top: -70px">
              <strong>{{$request->name}}{{$request->status}}</strong> <br>
              <span style="opacity: .5">63 matual friends</span> 
            </div>
          </td>
          <div class="clearfix">...</div>
          <td >
            <form method="POST" action="{{route('friend.accept',$request->id)}}">
              {{csrf_field()}}
            <button class="btn btn-info" >accept Friend 
            </button>
            </form><div class="clearfix">...</div>
            <form method="POST" action="{{route('friend.remove',$request->id)}}">
              {{csrf_field()}}
            <button class="btn btn-info" >Remove 
            </button>
            </form>
          </td>
      </tr>

    @endforeach
    </tbody>
  </table>
       
  </div>
</div>
@else
<div class="container" style="margin-bottom: 20px">
  <div class="col-md-8">
   <div class="panel panel-primary">
     <span style="text-align: center;margin: auto;padding: 20px" >you donot have any friend requests </span> 
   </div>
  </div> 
</div>
@endif

   <!--show friends list-->
@if(Auth::user()->friends()->count() > 0 )
<div class="container" style="margin-bottom: 20px">
  <div class="col-md-8"style="background-color: #fff">
    <h2 class="subheader">My Friends</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach(Auth::user()->friends as $friend)
      <tr >
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="...">
            </div>
            
            <div style="float: right;margin-top: -70px">
              <strong>{{$friend->name}}</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div>
            </td>
         
          <td style="float: right;">
            <span class="btn btn-primary" style="margin: 5px">
              Friend 
            </span>
            <form method="POST" action="{{route('friend.remove',$friend->id)}}">
              {{csrf_field()}}
            <button class="btn btn-info" >Remove 
            </button>
            </form>
          </td>
      </tr>
    @endforeach
    </tbody>
  </table>
       
  </div>
</div>
@else
<div class="container" style="margin-bottom: 20px">
  <div class="col-md-8">
   <div class="panel panel-primary">
     <span style="text-align: center;margin: auto;padding: 20px" >add new friends increase your contacts</span> 
   </div>
  </div> 
</div>
@endif
<!--find friends list-->
<div class="container" >
    <div class="col-md-8" style="background-color: #fff">
    
  <h2 class="subheader">Find Friends</h2><hr>
  <table style="width:100%;">
    
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>
            <div><img class="media-object" src="http://placeimg.com/80/80" alt="..."></div>
            <div style="float: right;margin-top: -70px"> <strong>{{$user->name}}</strong> <br>
              <span style="opacity: .5">63 matual friends</span> </div>
          </td>
          <td style="float: right;">
              @if(Auth::user()->requestIsSent($user->id))   
                 <button type="submit"  class="btn btn-primary btn-sm request" @click="showModal()">
                 <span style="color: "><i class="fa fa-check" aria-hidden="true"></i>
               request sent</span> 
                 </button> 
                @elseif(Auth::user()->isFriend($user->id))
                <span class="btn btn-primary" style="margin: 5px">
                 Friend 
                </span>
                @else
                 <form method="POST" action="{{route('friend.add',$user->id)}}">
                    {{ csrf_field() }}
                  <button class="btn btn-success" style="margin: 5px  ">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                     Add Friend 
                  </button></form> 
                @endif
                <button type="submit" class="btn btn-info" >
                  Remove 
                </button>
          </td>         
      </tr>    
      @endforeach 
    </tbody>
  </table>
</div>
</div>

@endsection
@section('scripts')
 <script>
    new Vue({
      el:'#app',
      methods: {
        showModal () {
         this.$refs.myModalRef.show()
        }
      }
    })
</script>

@endsection