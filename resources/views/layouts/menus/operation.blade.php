@if(Auth::user()->isAdmin())
        {{-- Operaciones --}}

   <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-tram-side"></i>
        <span> {{__('Operations')}}</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        {{-- Proyects --}}
        <li>
            <a href="#" class="waves-effect">
                <i class="mdi mdi-projector"></i>
                <span>{{__('Option 1')}}</span>
            </a>
        </li>


    </ul>
@else
    {{-- No Admin--}}

        <a href="#" class="ml-3 waves-effect">
            <i class="mdi mdi-projector"></i>
            <span>{{__('No admin')}}</span>
        </a>


@endif

