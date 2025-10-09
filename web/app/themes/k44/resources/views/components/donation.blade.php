@props([
    'isGray' => null,
])

<div class="donation">
    <button class="donation__btn btn btn__standart {{ $isGray ? 'donation__btn--light' : '' }}" data-pop=".donation__popup">{{ __('Пожертвування', 'k44') }}</button>

    <div class="donation__popup">
        <div class="donation__wrap">
            <div class="donation__popup-close">
                <span></span>
                <span></span>
            </div>
            <div class="donation__popup-controls">
                <div class="donation__popup-control active">{{ __('Місцеві (по Україні)', 'k44') }}</div>
                <div class="donation__popup-control">{{ __('Міжнародні', 'k44') }}</div>
            </div>
            <div class="donation__popup-tabs">
                <div class="donation__popup-tab donation__popup-tab-local active">{!! $donations_local !!}</div>
                <div class="donation__popup-tab donation__popup-tab-international">{!! $donations_international !!}</div>
            </div>
        </div>
    </div>
</div>