<div class="control">
    <input type="hidden" name="_method" value="{{ ${$resource} !== null ? 'PUT' : 'POST' }}">
    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
    <button type="submit" class="button is-info is-fullwidth is-large">{{ __('admin.save') }}</button>
</div>
</form>
</div>
</section>
