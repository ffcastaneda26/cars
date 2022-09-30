@if ($promotion_id)
    <div class="container">
        <div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2 mb-4">


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
        @include('common.pagination')
    </div>
@endif
