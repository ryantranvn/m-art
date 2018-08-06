<script>
    var maxQuantity = <?php echo MAX_QUANTITY; ?>

    var trans = {};
    <?php foreach (trans('adminbsb.js') as $key => $trans) { ?>
        trans.<?=$key?> = "<?=$trans?>"
    <?php } ?>
</script>