@csrf

<textarea name="body" cols="30" rows="5" class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding boder boder-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">{{ $comment->body ?? old( 'body' ) }}</textarea>
<label for="visible" >
    <input
        type="checkbox"
        name="visible"
        @if (isset($comment) && $comment->visible)
            @checked(true)    
        @endif
    >
    Visível?
</label>

<button type="submit" class="w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Enviar</button>