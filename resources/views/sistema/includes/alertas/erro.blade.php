@if (session()->get('erro'))
    <div class="w-full mb-3">
        <div x-data="{ isShow: true }" :class="!isShow && 'opacity-0 transition-opacity duration-300'"
            class="alert flex items-center justify-between overflow-hidden rounded-lg border border-info text-info">
            <div class="flex">
                <div class="bg-error p-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="px-4 py-3 sm:px-5">{!! session()->get("erro") !!}</div>
            </div>
            <div class="px-2">
                <button @click="isShow = false; setTimeout(()=>$root.remove(),300)"
                    class="btn h-7 w-7 rounded-full p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif