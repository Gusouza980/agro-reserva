<div class="grow w-full">
    {{-- @if(!$agent->isMobile()) --}}
        <div class="grid w-full grid-cols-1 md:grid-cols-5 gap-6 mt-4 text-center md:text-start">
            @foreach($produtos as $produto)
                <x-marketplace.card-produto :produto="$produto"></x-marketplace.card-produto>
            @endforeach
        </div>
    {{-- @else --}}

    {{-- @endif --}}
</div>