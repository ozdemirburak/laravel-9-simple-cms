<div class="container-item {{ $isActive ?? '' }}" id="{{ $id }}">
    <table class="table is-fullwidth is-striped">
        <tbody>
        @foreach($data as $i => $p)
            <tr>
                <td><span>{{ $i + 1 }}. </span>{{ $p[$key] }}</td>
                <td class="has-text-right">{{ !isset($isDate) ? $p[$value] : gmdate('H:i:s', $p[$value]) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
