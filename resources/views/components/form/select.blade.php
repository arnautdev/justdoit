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
@endphp

<div class="form-group">
    {{ Form::label($name, __($label)) }}
    {{ Form::select($name, $options, old($name), $attrs) }}
</div>
<!-- End ./form-group -->
