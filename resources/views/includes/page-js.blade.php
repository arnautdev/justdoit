<script type="text/javascript">
    var $appLocale = '{{ app()->getLocale() }}';
</script>
@stack('scriptsBefore')
<script src="{{ asset('js/default.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
