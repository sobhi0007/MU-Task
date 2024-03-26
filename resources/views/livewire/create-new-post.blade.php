<div>
    <form wire:submit.prevent="postTweet" >
        @csrf
        <div class="tweetbox__input">
          <img
            src="https://png.pngitem.com/pimgs/s/273-2738704_user-login-png-transparent-logo-twitter-blanco-png.png"
            alt="" />
          <input type="text" wire:model="tweet" placeholder="What's happening?" />
        </div>
        <button 
         class="tweetBox__tweetButton">Tweet</button>
      </form>
      
        @error('tweet') <span class="error text-danger fw-bold ms-4">{{ $message }}</span> @enderror

      
</div>
