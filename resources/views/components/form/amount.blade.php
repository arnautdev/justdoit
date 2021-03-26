@php

    $name = $data['name'] ?? 'name';
    $model = $data['model'] ?? '';
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

    $value = '';
    if(old($name)){
        $value = old($name);
    }

    if(isset($data[$name])){
        $value = number_format(($data[$name] / 100), 2);
    }

    if(isset($model) && isset($data[$model][$name])){
        $value = number_format(($data[$model][$name] / 100), 2);
    }
@endphp

<div class="form-group">
    {{ Form::label($name, __($label)) }}
    {{ Form::text($name, $value, $attrs) }}
</div>
<!-- End ./form-group -->

@push('scripts')
    <script type="text/javascript">
        $(document).on('focusout', 'input[name="{{ $name }}"]', function () {
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
