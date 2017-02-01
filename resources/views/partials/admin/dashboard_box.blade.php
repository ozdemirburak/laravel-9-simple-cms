<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-{{ $bg }}">@fa($icon)</span>
        <div class="info-box-content">
            <span class="info-box-text">{{ trans(implode('.', ['admin', 'fields', 'dashboard', $field])) }}</span>
            <span class="info-box-number">{{ $value }}</span>
        </div>
    </div>
</div>
