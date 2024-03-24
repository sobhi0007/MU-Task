<div class="row" wire:poll>


    @foreach ($posts as $post )


    <div class="post col-12">
        <div class="post__avatar">
            <img src="https://png.pngitem.com/pimgs/s/273-2738704_user-login-png-transparent-logo-twitter-blanco-png.png" alt="" />
        </div>

        <div class="post__body">
            <div class="post__header">
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
            <img src="https://www.focus2move.com/wp-content/uploads/2020/01/Tesla-Roadster-2020-1024-03.jpg" class="img-fluid" />
            <div class="text-secondary fw-light my-2">{{ \Carbon\Carbon::parse($post->updated_at)->format('h:i A · M d, Y') }}</div>
            <div class="post__footer">
                <span class="material-icons"> repeat </span>
                <span class="material-icons"> favorite_border </span>
                <span class="material-icons"> publish </span>
            </div>
        </div>
    </div>
@endforeach


</div>