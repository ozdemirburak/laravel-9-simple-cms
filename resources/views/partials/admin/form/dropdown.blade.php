<div class="field">
    <label class="label">{{ __('admin.fields.' . $resource . '.' . $attribute) }}</label>
    <div class="control">
        <div class="select is-medium is-fullwidth">
            <select name="{{ $attribute }}">
                @if (isset($null) && $null === true)
                    <option value="{{ null }}">{{ __('admin.none') }}</option>
                @endif
                @foreach ($options as $key => $value)
                    <option {{ $key === (${$resource}->$attribute ?? old($attribute)) ? 'selected' : '' }} value="{{ isset($valueOnly) ? $value :  $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
