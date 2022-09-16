<!--
/**+--------------------------------------------------------------------+
 * | Fecha      |  Autor   |      Observaciones                         |
 * +------------+----------+--------------------------------------------+
 * |17-junio-22 | MANN     | Modificacion de Modal Con Bootstrap        |
 * +------------+-------------------------------------------------------+
 */-->

<div class="modal fade bs-example-modal-sm show" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="mySmallModalLabel">{{__('Confirm Delete')}}</h5>
                <button type="button" class="btn-close" wire:click="closeModal()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto items-center justify-center  rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: exclamation -->
                            <svg class="justify-center items-center" width="35px" height="35px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            {{__('Are You Sure ?')}}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{__("You won't be able to revert this!")}}
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="delete()"
                    class="btn btn-info">
                        {{__('Yes Confirme!')}}
                    </button>
                    <button type="button" wire:click="closeModal()"
                    class="btn btn-danger" data-bs-dismiss="modal">
                        {{__('Cancel')}}
                    </button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>