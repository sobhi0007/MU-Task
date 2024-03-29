<div class="row" wire:poll>

    @forelse ($posts as $post )


        <div class="post col-12" wire:key="post-{{ $post->id }}">
            <div class="post__avatar">
                <img src="https://png.pngitem.com/pimgs/s/273-2738704_user-login-png-transparent-logo-twitter-blanco-png.png"
                    alt="" />
            </div>

            <div class="post__body">
                <div class="post__header mt-1">
                    <div class="post__headerText">
                        <h3>
                            {{$post->user->name}}
                            <span class="post__headerSpecial"><span class="material-icons post__badge"> verified
                                </span>@somanathg</span>
                        </h3>
                    </div>
                    <div class="post__headerDescription">
                        <p> {{$post->content}}</p>
                    </div>
                </div>
                @if($post->getFirstMediaUrl('images'))
                <img src="{{$post->getFirstMediaUrl('images')}}" class="img-fluid" />
                @endif
                <div class="text-secondary fw-light ">{{ \Carbon\Carbon::parse($post->updated_at)->format('h:i A · M d, Y')
                    }}</div>

                <div wire:ignore.self class="collapse" id="collapseExample{{$loop->iteration}}">
                    <div class="card card-body">

                        @forelse ($post->comments as $comment)
                        <div class="bg-seocndary row m-2 comment-bg" wire:key="comment-{{ $comment->id }}">
                            <div class="post__avatar col-12 col-sm-2">
                                <img src="https://png.pngitem.com/pimgs/s/273-2738704_user-login-png-transparent-logo-twitter-blanco-png.png"
                                    alt="">
                            </div>
                            <div class="post__body col-12 col-sm-10">
                                <div class="post__header">
                                    <div class="post__headerText">
                                        <h3>
                                            {{$comment->user->name}}
                                            <span class="post__headerSpecial"><span class="material-icons post__badge">
                                                    verified
                                                </span>@somanathg</span>
                                        </h3>
                                    </div>
                                    <div class="post__headerDescription">
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>

                                <div class="text-secondary fw-light my-2 fw-bold fs-5">{{
                                    \Carbon\Carbon::parse($comment->updated_at)->format('h:i A · M d, Y') }}
                                </div>

                                <div class="d-flex justify-content-end mb-1">
                                    @if(auth()->user()->id == $comment->user_id)
                                    <span class="fs-5 text-danger pointer fw-bolder"
                                        wire:click="commentDelete({{ $comment->id }})">Delete
                                        your comment </span>
                                    @endif
                                </div>
                            </div>

                        </div>



                        @empty
                        <div class="text-center fw-bold">
                            <span class="text-secondary d-block">No comments yet </span>
                            <span class="text-secondary">Be the first to comment</span>
                        </div>
                        @endforelse


                        <div class=" my-4">
                            <form wire:submit.prevent='addNewComment({{$post->id}})'>
                                @csrf
                                <div class="row">
                                    <div class="col-10">

                                        <input wire:model="comment" class="form-control rounded-pill"
                                            id="commentFormControlInput1" placeholder="Make a comment !">
                                    </div>
                                    <div class="col-2">
                                        <button class="btn rounded-circle btn-light text-primary"> <i
                                                class="fa fa-paper-plane" aria-hidden="true"></i></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="post__footer">
                    <span class="material-icons"> <a data-bs-toggle="collapse" href="#collapseExample{{$loop->iteration}}"
                            role="button" aria-expanded="false" aria-controls="collapseExample{{$loop->iteration}}">
                            comments
                        </a> </span>
                    <span class="material-icons"> favorite_border </span>
                    @if(auth()->user()->id == $post->user_id)
                    <span wire:click="postDelete({{ $post->id }})" class="material-icons pointer"> <i
                            class="fa fa-trash text-danger fs-4" aria-hidden="true"></i> </span>
                    @endif


                </div>
            </div>
        </div>
    @empty
        <div class="text-center fw-bold text-secondary mt-3">
            <h3>No posts yet !</h3>
            Be the first spark.
        </div>    
    @endforelse


</div>