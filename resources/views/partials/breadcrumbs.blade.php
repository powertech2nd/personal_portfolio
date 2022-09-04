@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
            <li class="breadcrumb-item">
                <span>
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </span>
            </li>
            @else
                <li class="breadcrumb-item active">
                    <span>{{ $breadcrumb->title }}</span>
                </li>
            @endif
        @endforeach
        </ol>
    </nav>
@endunless