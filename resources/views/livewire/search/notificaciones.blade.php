{{-- <div class="dropdown d-inline-block me-2">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ion ion-md-notifications"></i>
        <span class="badge bg-danger rounded-pill">3</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0 font-size-16"> Notification (3) </h5>
                </div>
            </div>
        </div>
        <div data-simplebar="init" style="max-height: 230px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden; padding-right: 0px; padding-bottom: 0px;"><div class="simplebar-content" style="padding: 0px;">
            <a href="" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-success rounded-circle font-size-16">
                            <i class="mdi mdi-cart-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                            <i class="mdi mdi-message-text-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1">You have 87 unread messages</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-info rounded-circle font-size-16">
                            <i class="mdi mdi-glass-cocktail"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1">It is a long established fact that a reader will</p>
                        </div>
                    </div>
                </div>
            </a>

        </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
        <div class="p-2 border-top">
            <div class="d-grid">
                <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                    View all
                </a>
            </div>
        </div>
    </div>
</div --}}
<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect show" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img width="32" height="32" class="rounded-circle object-cover" src="https://ui-avatars.com/api/?name=M+G&amp;color=7F9CF5&amp;background=EBF4FF" alt="Manager General">
            </button>
    <div class="dropdown-menu dropdown-menu-end show" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(0px, 72px, 0px);" data-popper-placement="bottom-end" data-popper-escaped="">
        <!-- item-->
                    <a class="dropdown-item" href="http://cuervo.test/user/profile"> Perfil</a>

        <div class="dropdown-divider"></div>

        <!-- Authentication -->
        <form method="POST" action="http://cuervo.test/logout">
            <input type="hidden" name="_token" value="Q7R1M2b0n4g4QN3wU5qxdYthYXhJRiM6euGwML0p">            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="http://cuervo.test/logout" onclick="event.preventDefault();
                            this.closest('form').submit();">Salir</a>
        </form>
    </div>
</div>
