
<a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="mdi mdi-buffer"></i>
    <span> {{__('Configuration')}}</span>
</a>

<ul class="sub-menu" aria-expanded="false">
    <li>
        <a href="{{route('users')}}" class="waves-effect">
            <i class="mdi mdi-account-box"></i>
            <span> {{__('Users')}} </span>
            </a>
    </li>


    <li>
        <a href="{{route('role')}}" class="waves-effect">
            <i class="mdi mdi-cube-outline"></i>
            <span> {{__('Roles')}} </span>
        </a>
    </li>

    <li>
        <a href="{{route('permission')}}" class="waves-effect">
            <i class="mdi mdi-calendar-check"></i>
            <span>{{__('Permissions')}}</span>
        </a>
    </li>

    {{-- Géneros --}}
    <li>
        <a href="{{route('genders')}}" class="waves-effect">
            <i class="mdi mdi-gender-transgender"></i>
            <span>{{__('Genders')}}</span>
        </a>
    </li>

    {{-- Promociones --}}
    <li>
        <a href="{{route('promotions')}}" class="waves-effect">
            <i class="mdi mdi-spin mdi-klingon"></i>
            <span>{{__('Promotions')}}</span>
        </a>
    </li>


    {{-- Regalos --}}
    <li>
        <a href="{{route('gifts')}}" class="waves-effect">
            <i class="mdi mdi-gift"></i>
            <span>{{__('Gifts')}}</span>
        </a>
    </li>

    {{-- Tipos de Pregunta --}}
    <li>
        <a href="{{route('types-question')}}" class="waves-effect">
            <i class="mdi mdi-frequently-asked-questions"></i>
            <span>{{__('Types Question')}}</span>
        </a>
    </li>

    {{-- Preguntas --}}
    <li>
        <a href="{{route('questions')}}" class="waves-effect">
            <i class="mdi mdi-head-question"></i>
            <span>{{__('Questions')}}</span>
        </a>
    </li>

    {{-- Opciones --}}
    <li>
        <a href="{{route('options')}}" class="waves-effect">
            <i class="mdi mdi-clipboard-list"></i>
            <span>{{__('Options')}}</span>
        </a>
    </li>

    {{-- Preguntas x Promoción --}}
    <li>
        <a href="{{route('promotion-questions')}}" class="waves-effect">
            <i class="mdi mdi-beaker-question-outline"></i>
            <span>{{__('Questions by Promotion')}}</span>
        </a>
    </li


    {{-- Etnias --}}
    <li>
        <a href="{{route('ethnicites')}}" class="waves-effect">
            <i class="mdi mdi-nature-people"></i>
            <span>{{__('Ethnicities')}}</span>
        </a>
    </li>


    {{-- Rangos de Edades --}}
    <li>
        <a href="{{route('edge-ranges')}}" class="waves-effect">
            <i class="mdi mdi-calendar-range"></i>
            <span>{{__('Edge Ranges')}}</span>
        </a>
    </li>
    {{-- Clientes --}}
    <li>
        <a href="{{route('customers')}}" class="waves-effect">
            <i class=" fas fa-address-card"></i>
            <span>{{__('Customers')}}</span>
        </a>
    </li>



</ul>
