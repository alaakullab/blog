   <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">{{setting('site_name_'.app('l'))}}</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="<?php if(Request::segment(1) == '' ){echo '#top' ;}else{echo '/';}  ?>" class="smoothScroll s">
                                 {{trans('admin.home')}}</a></li>
                         <li><a href="<?php if(Request::segment(1) == 'partner'){echo '/partner';}else{ echo url('partner') ;} ?>" class="smoothScroll s">{{trans('admin.partner')}}</a></li>
                         <li><a href="<?php if(Request::segment(1) == 'hire'){echo '/hire#hire';}else{ echo url('hire') ;} ?>" class="smoothScroll s">{{trans('admin.hire')}}</a></li>
                         <li><a href="#contact" class="smoothScroll s">{{trans('admin.about_us')}}</a></li>
                         <li><a href="{{url('bloger')}}" class="smoothScroll s">{{trans('admin.blog')}}</a></li>
                         {{-- <li><a href="#testimonial" class="smoothScroll">{{trans('admin.blog')}}</a></li> --}}
                         <li><a href="{{url('E-commerce')}}" class="smoothScroll s">{{trans('admin.store')}}</a></li>
                          <li><a href="{{url('draftsman/all')}}" class="smoothScroll">{{trans('admin.draftsmens')}}</a></li>
                         @if(app('l') == 'ar')

                         <li><a href="{{aurl('lang/en')}}" class="smoothScroll s">{{trans('admin.en')}} </a></li>
                         @else
                         <li><a href="{{aurl('lang/ar')}}" class="smoothScroll s">{{trans('admin.ar')}} </a></li>

                         @endif

                    </ul>
                   {{--<ul class="nav navbar-nav navbar-right">--}}
                       {{--<div class="middle-area" style="display: block;background-color: #F2F2F2;">--}}
                           {{--<span><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a></span> |--}}
                           {{--<span><a href="{{url('/E-commerce/register')}}">{{trans('admin.register')}}</a></span>--}}
                       {{--</div>--}}

                   {{--</ul>--}}

                   <ul class="nav navbar-nav navbar-right">

                       <li>
                       <!--                             <a href="https://wa.me/+{{setting()->phone}}"><i class="fa fa-phone"></i> +{{setting()->phone}}</a>-->
                           <a  target="_blank" title="Contact Us On WhatsApp" href="https://web.whatsapp.com/send?phone=+{{setting()->phone}}" class=" hidemobile" >
                               <i class="fa fa-whatsapp"></i> +{{setting()->phone}}
                           </a>
                           <a  target="_blank" title="Contact Us On WhatsApp" href="https://wa.me/+{{setting()->phone}}" class=" hideweb" >
                               <i class="fa fa-whatsapp"></i> +{{setting()->phone}}
                           </a>

                           <script type="text/javascript">
                               var mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
                               if (mobile) {

                                   $('.hidemobile').css('display', 'none'); // OR you can use $('.hidemobile').hide();
                               }
                               else
                               {
                                   $('.hideweb').css('display', 'none'); // OR you can use $('.hideweb').hide();
                               }
                           </script>
                       </li>
                       @if(Auth::check())
                           <li class="navbar-right"><a href="{{url('/bloger/logout')}}" >{{empty(Auth::user()->First_Name.Auth::user()->Last_Name) ? Auth::user()->username : Auth::user()->First_Name .' '.Auth::user()->Last_Name }}</a>
                           </li>
                       @else
                           <li class="navbar-right"><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a>
                           </li>
                       @endif
                   </ul>
               </div>

          </div>

   </section>
   @if(!Auth::check())
       <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
           <div class="modal-dialog modal-sm">

               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title" id="Login">{{trans('admin.Customer_login')}}</h4>
                   </div>
                   <div class="modal-body">
                       {!! Form::open(['route'=>'shop.login','method'=>'post']) !!}
                       {{ csrf_field() }}
                       <div class="form-group">
                           <input type="email" class="form-control" name="email"
                                  pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+"
                                  title="default@example.com"
                                  required=""
                                  id="email-modal" placeholder="email">
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-control" name="password" required="" id="password-modal"
                                  placeholder="password">
                       </div>

                       <p class="text-center">
                           <button class="btn btn-primary"><i class="fa fa-sign-in"></i> {{trans('admin.Log_in')}}
                           </button>
                       </p>

                       </form>

                       <p class="text-center text-muted">{{trans('admin.Not_registered_yet')}}</p>
                       <p class="text-center text-muted"><a
                                   href="{{url('E-commerce/register')}}"><strong>{{trans('admin.register_now')}}</strong></a>! {{trans('admin.It_is_easy')}}
                       </p>

                   </div>
               </div>
           </div>
       </div>
   @endif