<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
if($paginator->getLastPage() > 1):
    echo $presenter->render();
endif;
