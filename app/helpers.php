<?php

function route_class() {
    return str_replace('.','-',Route::currentRouteName());
}

//导航栏active状态
function active_class($category_id = 0) {
    if($category_id) {
        return request()->url() == route('categories.show',$category_id) ? "active" : '';
    }
        return request()->url() == route('topics.index') ? "active" : '';

}
