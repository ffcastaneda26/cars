<div>
    @if ($show_coupon)
        @include('livewire.customer_controller.show_coupon')
    @else
        @include('livewire.customer_controller.show_form')
    @endif
</div>