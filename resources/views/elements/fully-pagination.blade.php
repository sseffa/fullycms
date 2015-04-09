@if ($paginator->getLastPage() > 1)
<?php $previousPage = ($paginator->getCurrentPage() > 1) ? $paginator->getCurrentPage() - 1 : 1; ?>
<ul class="pagination pagination-lg">
    <li><a href="{!! $paginator->getUrl($previousPage) !!}"
       class="{!! ($paginator->getCurrentPage() == 1) ? ' disabled' : '' !!}">
        <i class="icon-angle-left"></i> {!! trans('fully.link_previous') !!}
    </a></li>
    @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
    <li class="{!! ($paginator->getCurrentPage() == $i) ? 'active' : '' !!}"><a href="{!! $paginator->getUrl($i) !!}">
        {!! $i !!}
    </a></li>
    @endfor
    <li><a href="{!! $paginator->getUrl($paginator->getCurrentPage()+1) !!}"
       class="{!! ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' !!}">
        {!! trans('fully.link_next') !!} <i class="icon-angle-right"></i>
    </a></li>
</ul>
@endif