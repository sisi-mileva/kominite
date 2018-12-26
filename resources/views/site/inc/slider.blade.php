<div class="products-slider">
    @foreach($albums as $album)
        <div>
            <a href="{{ url('/gallery/' . $album->id) }}">
                <img src="{{url('/storage/photos/' . $album->id . '/' . $album->cover_image)}}" alt="album"/>
            </a>
        </div>
    @endforeach
</div>