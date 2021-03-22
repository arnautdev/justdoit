@php

    $name = $data['name'] ?? 'name';
    $label = $data['label'] ?? ucfirst($name);

    $attrs['class'] = 'form-control ';
    if(isset($data['class'])){
        $attrs['class'] = $attrs['class'] . $data['class'];
    }

    if(isset($data['required'])){
        $attrs['required'] = 'required';
    }

    if(isset($data['attrs'])){
        $attrs = array_merge($attrs, $data['attrs']);
    }
@endphp

<div class="form-group">
    {{ Form::label($name, __($label)) }}
    {{ Form::text($name, old($name), $attrs) }}
</div>
<!-- End ./form-group -->

@push('scripts')
    <script type="text/javascript">
        $('input[name="{{ $name }}"]').focusout(function () {
            var $val = $(this).val();
            if (!Number.isInteger($val)) {
                $val = parseFloat($val);
            } else {
                $val = parseInt($val);
            }

            if (isNaN($val)) {
                $val = 0;
            }
            
            $(this).val($val.toFixed(2));
        });
    </script>
@endpush
