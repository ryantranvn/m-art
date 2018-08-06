<div class="col-sm-12">
    <div class="form-group">
        <div class="form-line">
            <div data-trigger="spinner" class="spinner">
                <input type="text" name="order" value="<?php echo e($orderValue); ?>" data-rule="quantity" data-min="0" class="form-control positiveNumber" maxlength="3" style="text-align: center !important;" />
                <span class="btnSpinner btnSpinnerUp" data-spin="up">
                    <i class="material-icons">keyboard_arrow_up</i>
                </span>
                <span class="btnSpinner btnSpinnerDown" data-spin="down">
                    <i class="material-icons">keyboard_arrow_down</i>
                </span>
            </div>
        </div>
    </div>
</div>