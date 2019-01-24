<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item start {{active_link('tag','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-tag"></i>
        <span class="title">{{trans('admin.tag')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('tag','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('tag','active open')}}  ">
            <a href="{{aurl('tag')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.tag')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('tag') }}/?softdelete=true" class="nav-link ">
                <i class="fa fa-recycle"></i>
                <span class="title"> {{trans('admin.tag_softdelete')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
               <li class="nav-item start">
            <a href="{{ aurl('tag/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('post','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa  fa-reorder"></i>
        <span class="title">{{trans('admin.post')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('post','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('post','active open')}}  ">
            <a href="{{aurl('post')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.post')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start {{active_link('post?softdelete','active open')}}">
            <a href="{{ aurl('post/') }}/?softdelete" class="nav-link ">
                <i class="fa fa-recycle"></i>
                <span class="title"> {{trans('admin.post_softdelete')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
          <li class="nav-item start">
            <a href="{{ aurl('post/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('comment','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-comments"></i>
        <span class="title">{{trans('admin.comment')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('comment','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('comment','active open')}}  ">
            <a href="{{aurl('comment')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.comment')}}  </span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
</li>
<li class="nav-item start {{active_link('departments','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa  fa-tags"></i>
        <span class="title">{{trans('admin.departments')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('departments','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('departments','active open')}}  ">
            <a href="{{aurl('departments')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.departments')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('departments/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('product','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa  fa-tasks"></i>
        <span class="title">{{trans('admin.product')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('product','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('product','active open')}}  ">
            <a href="{{aurl('product')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.product')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
           <li class="nav-item start {{active_link('product?softdelete','active open')}}">
            <a href="{{ aurl('product') }}/?softdelete" class="nav-link ">
                <i class="fa fa-recycle"></i>
                <span class="title"> {{trans('admin.product_softdelete')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('product/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('order','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-shopping-cart"></i>
        <span class="title">{{trans('admin.order')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('order','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('order','active open')}}  ">
            <a href="{{aurl('order')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.order')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start {{active_link('order?pending','active open')}}  ">
            <a href="{{aurl('order')}}?pending" class="nav-link ">
                <i class="fa fa-thumbs-o-down"></i>
                <span class="title">{{trans('admin.order_pending')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start {{active_link('order?delivered','active open')}}  ">
            <a href="{{aurl('order')}}?delivered" class="nav-link ">
                <i class="fa  fa-thumbs-o-up"></i>
                <span class="title">{{trans('admin.order_delivered')}}  </span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
</li>
<li class="nav-item start {{active_link('hire','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-align-justify"></i>
        <span class="title">{{trans('admin.hire')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('hire','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('hire','active open')}}  ">
            <a href="{{aurl('hire')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.hire')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('send','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-paper-plane"></i>
        <span class="title">{{trans('admin.send_email')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('send','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('send','active open')}}  ">
            <a href="{{aurl('send')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.send_email')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('contact','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-envelope"></i>
        <span class="title">{{trans('admin.Contact')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('contact','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('contact','active open')}}  ">
            <a href="{{aurl('contact')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.contact')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('admin','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-user"></i>
        <span class="title">{{trans('admin.admin')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('admin','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('admin','active open')}}  ">
            <a href="{{aurl('admin')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.admin')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('admin/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('user','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-users"></i>
        <span class="title">{{trans('admin.user')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('user','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('user','active open')}}  ">
            <a href="{{aurl('user')}}" class="nav-link ">
                <i class="fa fa-align-justify"></i>
                <span class="title">{{trans('admin.user')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start">
            <a href="{{ aurl('user/create') }}" class="nav-link ">
                <i class="fa fa-plus"></i>
                <span class="title"> {{trans('admin.create')}}  </span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start {{active_link('setting','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cogs"></i>
        <span class="title">{{trans('admin.setting')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('setting','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('setting','active open')}}  ">
            <a href="{{aurl('setting')}}" class="nav-link ">
                <i class="fa fa-edit"></i>
                <span class="title">{{trans('admin.setting')}}  </span>
                <span class="selected"></span>
            </a>
        </li>



    </ul>
</li>
<li class="nav-item start {{active_link('partner','active open')}}{{active_link('service','active open')}}{{active_link('slider','active open')}} ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa  fa-gear"></i>
            <span class="title">@awt('System constants','en') </span>
            <span class="selected"></span>
            <span class="arrow {{active_link('setting','open')}}"></span>
        </a>
        <ul class="sub-menu" style="{{active_link('','block')}}">

                 <li class="nav-item start {{active_link('partner','active open')}}  ">
                <a href="{{aurl('partner')}}" class="nav-link ">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">{{trans('admin.partner')}}  </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start {{active_link('home_login','active open')}}  ">
                <a href="{{aurl('home_login')}}" class="nav-link ">
                    <i class="fa fa-sign-in"></i>
                    <span class="title">{{trans('admin.home_login')}}  </span>
                    <span class="selected"></span>
                </a>
            </li>
                      <li class="nav-item start {{active_link('service','active open')}}  ">
                <a href="{{aurl('service')}}" class="nav-link ">
                    <i class="fa  fa-edit"></i>
                    <span class="title">{{trans('admin.service')}}  </span>
                    <span class="selected"></span>
                </a>
            </li>
           <li class="nav-item start {{active_link('slider','active open')}}  ">
                <a href="{{aurl('slider')}}" class="nav-link ">
                    <i class="fa fa-sliders"></i>
                    <span class="title">{{trans('admin.slider')}}  </span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>
