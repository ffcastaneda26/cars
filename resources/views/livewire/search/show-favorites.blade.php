<div>
    @if($total_my_favorites)
        <div class="dropdown d-inline-block me-2">
        <button type="button"
                wire:click="$toggle('show_my_favorites')"
                class="btn header-item noti-icon waves-effect"
                id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
            <img   src="{{ asset('/images/icons/favorite_yes.png') }}" height="50px"></a>
            <span class="badge bg-danger rounded-pill">{{ $total_my_favorites }}</span>
        </button>
    @endif
    @if($show_my_favorites && $total_my_favorites)
            <div>
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="m-0 font-size-16"> {{ __('My Favorites') }} </h5>
                        </div>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    <ul class="list-group list-group-flush">
                            @foreach(Auth::user()->favorites as $favorite)
                                <li class="list-group-item text-bg-warning p-1">
                                    {{  $favorite->make }} - {{ $favorite->model_year }} - {{ $favorite->model }}
                                </li>
                            @endforeach
                    </ul>
                </ul>

                <div class="p-2 border-top">
                    <div class="d-grid">
                        <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                            View all
                        </a>
                    </div>
                </div>
            </div>
    @endif
</div>
</div>
