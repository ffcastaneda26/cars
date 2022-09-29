@if ($promotion_id)
<div class="col-lg-9">
    <table class="table table-hover mb-0">
        <thead>
            <tr class="h5 bg-dark text-white text-center">
                <th colspan="2">{{__("Question")}}</th>
                <th>{{__("Link")}}</th>
            </tr>
        </thead>
        <tbody>
            @include('livewire.configuration.promotions_list')
        </tbody>
    </table>
</div>
@endif
@if ($promotion_id)
    @include('common.pagination')
@endif
