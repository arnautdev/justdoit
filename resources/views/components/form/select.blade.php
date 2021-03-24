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

    $options = [];
    if(isset($data['options'])){
        if(is_array($data['options'])){
            $data['options'] = collect($data['options']);
        }

        if(isset($data['emptyOption']) && $data['emptyOption'] == true){
            $data['options']->prepend(__('Select option ...'), '');
        }

        $options = $data['options'];
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
    {{ Form::select($name, $options, $value, $attrs) }}
</div>
<!-- End ./form-group -->
