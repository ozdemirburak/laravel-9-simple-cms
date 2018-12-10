<div class="control">
    @csrf
    <input type="hidden" name="_method" value="{{ ${$resource} !== null ? 'PUT' : 'POST' }}">
    <button type="submit" class="button is-info is-fullwidth is-large">{{ __('admin.save') }}</button>
</div>
</form>
</div>
</section>
