@if(isset($data['route']) && !is_null($data['route']))
    <a href="{{ $data['route'] }}" class="btn {{ $data['btnClass'] }}">
        <i class="{{ $data['icon'] }}"></i>&nbsp;
        {{ $data['title'] }}
    </a>
@else
    <button type="submit" class="btn {{ $data['btnClass'] }}">
        <i class="{{ $data['icon'] }}"></i>&nbsp;
        {{ __($data['title']) }}
    </button>
@endif
