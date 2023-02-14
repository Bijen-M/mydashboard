@if (isset($breadcrumbs))
<div class="breadcrumbs">
    <div class="breadcrumb__flex">
        <h2>{{isset($title) ? $title : 'Home'}}</h2>
        <div class="breadcrumb__right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {!! $breadcrumbs !!}
                </ol>
            </nav>
        </div>
    </div>
</div>
@endif