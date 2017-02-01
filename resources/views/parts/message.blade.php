
        @if (Session::has('message'))
          <div id="message" class="twelve columns add-bottom">
            {{Session::get('message')}}     
          </div> 
        @endif