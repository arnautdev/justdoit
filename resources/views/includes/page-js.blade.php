<script type="text/javascript">
    var $appLocale = '{{ app()->getLocale() }}';
</script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
