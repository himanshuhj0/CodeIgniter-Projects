<?php
foreach ($records as $value) { 
      $url_title = url_title($value['title']);
                    $url_title = base_url() . $value['id'] . '-' . $url_title;
    echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <a href="' . $url_title . '"><img src="' . base_url().$value['image'] . '" alt="' . htmlspecialchars($value['title']) . '"></a>
            <div class="caption">
                <h3><a href="' . $url_title . '">'.$value['title'].'</a></h3>
                <p>...</p>
                <p><a rel="nofollow" target="_blank" href="http://www.facebook.com/share.php?u=' . $url_title . '" class="btn btn-primary" role="button">Share</a> '
            . '<a href="' . $url_title . '" title="' . htmlspecialchars($value['title']) . '" class="btn btn-default" role="button">SeeMore</a><img src="' . base_url() . 'assets/imgs/langs/' . $value['country'] . '.jpg"></p>
            </div>
        </div>
    </div>
';
}