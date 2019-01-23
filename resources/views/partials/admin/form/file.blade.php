<div class="field">
    <div class="file is-large has-name">
        <label class="file-label">
            <input class="file-input" type="file" name="{{ $attribute }}">
            <div class="file-cta">
                <div class="file-icon">{!! icon('upload-cloud') !!}</div>
                <div class="file-label">{{ __('admin.fields.' . $attribute) }}</div>
            </div>
            <div class="file-name is-hidden"></div>
        </label>
    </div>
</div>
