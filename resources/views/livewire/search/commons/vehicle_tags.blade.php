<div class="vehicle-etiquetas">
    <ul class="list-group list-group-flush">

        @if($vehicle->show_tags() )
            @foreach($vehicle->read_tags_to_show(env('APP_MAX_TAGS_TO_SHOW',1)) as $dealer_tag)
                <li class="list-group-item p-1" style="color: orangered">
                    {{ App::isLocale('en') ? $dealer_tag->english : $dealer_tag->spanish }}
                </li>
            @endforeach
        @endif
    </ul>
</div>