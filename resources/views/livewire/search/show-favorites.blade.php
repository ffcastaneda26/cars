<div class="dropdown d-inline-block">
    <button type="button"
        class="btn header-item waves-effect"
        id="page-header-user-dropdown"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
            @if (Auth::user()->favorites->count())
            {{-- <i class="mdi mdi-cards-heart"></i> --}}
                <img width="48"
                    height="48"
                    class="rounded-circle object-cover"
                    src="{{ asset('/images/icons/favorite_yes.png') }}"
                >
                <span class="badge bg-danger rounded-pill">{{ $total_my_favorites }}</span>
            @endif
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->

        <div class="p-3">
            <div class="row align-items-center">
                <div class="col w-100">
                    <h5 class="m-0 font-size-16"> {{ __('My Favorites') }} </h5>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <ul class="list-group list-group-flush">
                <ul class="list-group list-group-flush">
                    @foreach(Auth::user()->favorites as $favorite)
                        <li class="list-group-item text-bg-secondary p-1 mt-2">
                                {{  $favorite->make }} - {{ $favorite->model_year }}
                        </li>
                    @endforeach
            </ul>

            <div class="p-2 border-top">
                <div class="d-grid">
                    <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                        {{ __('View all') }}
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
