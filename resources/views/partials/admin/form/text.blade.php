<div class="field">
    <label class="label">{{ __('admin.fields.' . $resource . '.' . $attribute) }}</label>
    <div class="control">
        @php $value = (${$resource}->$attribute ?? old($attribute)) @endphp
        <input class="input is-large {{ ($class ?? '') }}" value="{{ empty($value) ? ($default ?? '') : $value }}" type="{{ $type ?? 'text' }}" name="{{ $attribute }}">
    </div>
</div>
