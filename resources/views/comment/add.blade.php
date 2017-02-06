<div class="respond">

  <h3>Оставьте комментарий</h3>

<!-- form -->
<form name="contactForm" id="contactForm" method="post" action="{{route('comment.addPost', ['articleId' => $article->id])}}">
{{ csrf_field() }}
	<fieldset>
		<div class="message group">
		@foreach ($errors->get('text') as $message)
	        <ul>
	            <li class = "error">{{ $message }}</li>
	        </ul>
	    @endforeach
			<label  for="text">Text <span class="required">*</span></label>
			<textarea name="text"  id="text" rows="10" cols="50" >{{old('text')}}</textarea>
		</div>
		<button type="submit" class="submit">Сохранить</button>
	</fieldset>
</form> <!-- Form End -->

</div> <!-- Respond End -->	