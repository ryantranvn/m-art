<div class="m-t-10 switch text-uppercase">
    <label>
        <span class="switchOff">{{ getStatusText($module, 0) }}</span>
        <input type="checkbox" name="status" @if ($switchStatus == 1) checked @endif />
        <span class="lever switch-col-blue"></span>
        <span class="switchOn">{{ getStatusText($module, 1) }}</span>
    </label>
</div>
