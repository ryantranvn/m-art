<script>
    var ajaxUrl = "<?php echo url('/'.API_URL.'/ajax'); ?>";
    var themeUrl = "<?php echo url(BULK_SYSTEM_THEME); ?>";
    var maxsize = "<?php echo MAX_SIZE; ?>";
    var trans = {};
    <?php foreach (trans('adminbsb.js') as $key => $trans) { ?>
        trans.<?=$key?> = "<?=$trans?>"
    <? } ?>

</script>