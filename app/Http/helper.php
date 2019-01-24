<?php
if (!function_exists('slider_home')) {
    // function partner() {
    // 	return \App\partner::orderBy('id', 'desc')->first();
    // }
    function slider_home($row = null) {
        $slider = \App\Slider::where('type_file','homePage')->get();
        return $slider;
    }
}
if (!function_exists('dep_get')) {

    function dep_get($row = null) {
        $dep_get = \App\Department::get();
        return $dep_get;
    }
}
if (!function_exists('dep_shop')) {

    function dep_shop($row = null) {
        $dep_shop = \App\Department::where('parent_id', null)->latest()->limit(4)->get();
        return $dep_shop;
    }
}
if (!function_exists('tag_pluck')) {

    function tag_pluck($row = null) {
        $tag_pluck = App\Tag::pluck('name_'.app('l'),'id');
        return $tag_pluck;
    }
}
if (!function_exists('dep_first')) {

    function dep_first($row = null) {

        $dep_shop = \App\Department::where('parent_id', $row)->first();
        if($dep_shop )
        {
            return $dep_shop->dep_name_en;

        }else{
            return "#";

        }


    }
}
if (!function_exists('dep_parent')) {

    function dep_parent($row = null ,$type) {
        $dep_shop = \App\Department::where('id', $row)->first();
        if($dep_shop and $type)
        {
            return $dep_shop->$type;
        }else{
            return " ";
        }

    }
}
if (!function_exists('post_last2')) {

    function post_last2($row = null) {
        $post_last2 = \App\Post::latest()->limit(2)->get();
        return $post_last2;
    }
}
if (!function_exists('dep_shop_get')) {

    function dep_shop_get($row = null) {
        $par = \App\Department::where('dep_name_en',$row )->value('parent_id');
        $de = \App\Department::where('id', $par)->value('dep_name_en');
        return $de;
    }
}
if (!function_exists('dep_shop_parent')) {

    function dep_shop_parent($row = null) {
        $dep_shop = \App\Department::where('parent_id', $row)->get();
        return $dep_shop;
    }
}
if (!function_exists('Post_draftsman')) {

    function Post_draftsman($row = null) {
        $par = \App\Files::where('type_id',$row)->where('type_file','post_draftsmans')->get();
        return $par;
    }
}
if (!function_exists('Product_last')) {
    function Product_last($row = null) {
        $Product = \App\Product::latest()->limit(3)->get();

        return $Product;

    }
}
if (!function_exists('Product_first')) {
    function Product_first( $row) {
        $Product = \App\Files::where('type_id', $row)->where('type_file', 'products')->first();

        return $Product;

    }
}
if (!function_exists('Product_last5')) {
    function Product_last5($row = null) {
        $Product = \App\Product::latest()->limit(5)->get();

        return $Product;

    }
}
if (!function_exists('Post_last4')) {
    function Post_last4($row = null) {
        $Product = \App\Post::latest()->limit(4)->get();

        return $Product;

    }
}
if (!function_exists('post_find')) {
    function post_find($row = null) {
        $Product = \App\Post::find($row);

        return $Product;

    }
}
if (!function_exists('partner')) {
    // function partner() {
    // 	return \App\partner::orderBy('id', 'desc')->first();
    // }
    function partner($row = null) {
        $partner = \App\Partner::find(1);
        if ($partner->exists()) {
            if (!empty($row)) {

                return $partner->first()->{$row};
            } else {

                return $partner->first();
            }
        }
    }
}
if (!function_exists('Tag')) {
    function Tag($row = null, $id) {
        $table_row = \App\Tag::find($id);
        if ($table_row->exists()) {
            if (!empty($row)) {

                return $table_row->first()->{$row};
            } else {

                return $table_row->first();
            }
        }
    }
}
if (!function_exists('get_tag')) {
    function get_tag($row = null) {
        $tag = \App\Tag::latest()->limit(6)->get();

        return $tag;

    }
}
if (!function_exists('get_tag_all')) {
    function get_tag_all($row = null) {
        $tag = \App\Tag::get();

        return $tag;

    }
}
if (!function_exists('Service_row')) {
    function Service_row($row = null) {
        $Service = \App\Service::get();

        return $Service;

    }
}
if (!function_exists('product_row')) {
    function product_row($row) {
        $order = \Illuminate\Support\Facades\DB::table('order_product')->where('order_id', $row)->value('product_id');
        $product = \App\Product::find($order);

        return $product;

    }
}
if (!function_exists('product_find')) {
    function product_find($row) {
        $d = \App\Product::where('product_name_en',$row)->first();
        $prr = \App\Files::where('type_file','products')->where('type_id',$d->id)->first();


        return $prr;

    }
}
if (!function_exists('product_where')) {
    function product_where($row) {
        $d = \App\Product::where('id',$row)->get();


        return $d;

    }
}
if (!function_exists('order_qty')) {
    function order_qty($row) {
        $order = \Illuminate\Support\Facades\DB::table('order_product')->where('order_id', $row)->value('qty');

        // return $order;
        return $order;

    }
}
if (!function_exists('User_hire')) {
    function User_hire( $id) {
        return \App\User::find($id);


    }
}
if (!function_exists('User')) {
    function User($row = null, $id) {
        $table_row = \App\User::find($id);
        if ($table_row->exists()) {
            if (!empty($row)) {

                return $table_row->first()->{$row};
            } else {

                return $table_row->first();
            }
        }
    }
}
if (!function_exists('User_Team')) {
    function User_Team() {
        $table_row = \App\User::where('teams', 'yes')->latest()->limit(4)->get();
        return $table_row;
    }
}
if (!function_exists('User_get')) {
    function User_get() {
        $table_row = \App\User::get();
        return $table_row;
    }
}
if (!function_exists('setting')) {
    // function setting() {
    // 	return \App\Setting::orderBy('id', 'desc')->first();
    // }
    function setting($row = null) {
        $setting = \App\Setting::find(1);
        if ($setting->exists()) {
            if (!empty($row)) {

                return $setting->first()->{$row};
            } else {

                return $setting->first();
            }
        }
    }
}
if (!function_exists('load_dep')) {
    function load_dep($select = null, $dep_hide = null) {
        $departments = \App\Department::selectRaw('dep_name_' . app('l') . ' as text')
            ->selectRaw('id as id')
            ->selectRaw('parent_id as parent')
            ->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $departments) {
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            if ($select !== null and $select == $departments->id) {

                $list_arr['state'] = [
                    'opened' => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }
            if ($dep_hide !== null and $dep_hide == $departments->id) {

                $list_arr['state'] = [
                    'opened' => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden' => true,
                ];
            }
            $list_arr['id'] = $departments->id;
            $list_arr['parent'] = $departments->parent > 0 ? $departments->parent : '#';
            $list_arr['text'] = $departments->text;

            array_push($dep_arr, $list_arr);

        }
        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}
