@php

    $name = $data['name'] ?? 'name';
    $model = $data['model'] ?? '';
    $type = $data['type'] ?? 'text';
    $label = $data['label'] ?? ucfirst($name);

    $attrs['class'] = 'form-control date-picker';
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
        $value = $data[$name];
    }

    if(isset($model) && isset($data[$model][$name])){
        $value = $data[$model][$name];
    }
@endphp

<div class="form-group">
    {{ Form::label($name, __($label)) }}
    {{ Form::text($name, $value, $attrs) }}
</div>
<!-- End ./form-group -->
