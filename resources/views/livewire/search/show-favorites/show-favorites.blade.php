<div class="dropdown d-inline-block">
    <button type="button"
            wire:click="show_only_favorites"
            class="btn header-item waves-effect"
            id="page-header-user-dropdown"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
            @if (Auth::user()->favorites->count())
                <img width="48"
                    height="48"
                    class="rounded-circle object-cover"
                    src="{{ asset('/images/icons/favorite_yes.png') }}"
                >
                <span class="badge bg-danger rounded-pill">{{ $total_my_favorites }}</span>
            @endif
    </button>

</div>
