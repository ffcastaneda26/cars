<x-guest-layout>
    <div class="container">
        <div class="left">
            <div class="left-contenido">
                <img src="{{ asset('images/register_cuervo_izquierda.jfif') }}" alt="">
            </div>
        </div>

        <div class="right">
            <div class="flex-col">
                <div class="text-start ">
                    <div class="right-headings">
                        <h1 class="text-start">Sign up for a 90-Day Free Trail</h1>
                        <h2 class="text-start">List your Inventory. No Commissions, No Hidden Fees</h2>
                        <h4 class="text-start">No Credit Card Required</h4>
                    </div>
                </div>
                <div class="mt-10">
                    <div class="col-md-6">
                        @include('auth.register_form')
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
    

        
    </div>

</x-guest-layout>