@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class=" text-sm font-small text-grey-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-grey-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
