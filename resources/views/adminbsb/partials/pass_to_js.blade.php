<script>
    var ajaxUrl = "{!! url('/'.API_URL.'/ajax') !!}";
    var themeUrl = "{!! url(BULK_SYSTEM_THEME) !!}";
    var maxsize = "{!! MAX_SIZE !!}";
    var trans = {};
    <?php foreach (trans('adminbsb.js') as $key => $trans) { ?>
        trans.<?=$key?> = "<?=$trans?>"
    <? } ?>

</script>