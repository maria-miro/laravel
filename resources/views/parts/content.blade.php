
    <div class="row section-head">
        
        @if (Session::has('message'))
          <div id="message" class="twelve columns add-bottom">
            {{Session::get('message')}}     
          </div> 
        @endif

        <div id="main" class="twelve columns">

        @section ('content')

        @show    
   
        </div> <!-- end main -->

    </div> <!-- end row -->
