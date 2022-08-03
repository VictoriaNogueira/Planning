<?php
    function paginateLinks($data, $design = 'partials.paginate'){
        return $data->appends(request()->all())->links($design);
    }
?>
