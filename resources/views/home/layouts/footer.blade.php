
<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="section-title">
                        <h2>{{setting('site_name_'.app('l'))}}</h2>
                    </div>
                    <address>
                        {!!setting()->site_desc!!}
                    </address>

                    <ul class="social-icon">
                        @if(setting()->facebook)
                            <li><a href="{{setting()->facebook}}" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        @endif
                        @if(setting()->twitter)

                            <li><a href="{{setting()->twitter}}" class="fa fa-twitter"></a></li>
                        @endif
                        @if(setting()->instagram)
                            <li><a href="{{setting()->instagram}}" class="fa fa-instagram"></a></li>
                        @endif
                    </ul>

                    <div class="copyright-text">
                        <p>   {!!setting()->copyright!!} </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="section-title">
                        <h2>{{trans('admin.Contact_Info')}}</h2>
                    </div>
                    <address>
                        <p>{{setting()->phone}}</p>
                        <p><a href="mailto:{{setting()->mail}}">{{setting()->mail}}</a></p>
                    </address>

                    <div class="footer_menu">
                        <h2>{{trans('admin.Quick_Links')}}</h2>
                        <ul>
                            <li><a href="{{url('bloger')}}">{{trans('admin.blog')}}</a></li>
                            <li><a href="{{url('E-commerce')}}">{{trans('admin.story')}}</a></li>
                            <li><a href="{{url('Hire')}}">{{trans('admin.hire')}}</a></li>
                            <li><a href="{{url('Partner')}}">{{trans('admin.partner')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="footer-info newsletter-form">
                    <div class="section-title">
                        <h2>Newsletter Signup</h2>
                    </div>
                    <div>
                        {!!Form::open(['url'=>url('/E-commerce/New_news'),'method'=>'post'])!!}
                        <div class="form-group {{$errors->get('email_news') ? 'has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="Enter your email" name="email_news" id="email" required="">
                            @if($errors->get('email_news') )
                                <span class="help-block">
{{ $errors->first('email_news') }} </span>
                            @endif
                            <input type="submit" class="form-control" name="submit" id="form-submit" value="{{awtTrans('Send me','en')}}">
                            <span><sup>*</sup> @awt('Please note - we do not spam your email.','en')
                                       </span>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>


<!-- SCRIPTS -->

{{--<script src="https://vitalets.github.io/x-editable/assets/demo-mock.js"></script>--}}
<script src="{{url('blog/-ltr/')}}/js/owl.carousel.min.js"></script>
<script src="{{url('blog/-ltr/')}}/js/smoothscroll.js"></script>
<script src="{{url('blog/-ltr/')}}/js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#formabout-modal').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $('.dataUrl').val();
            var formdata = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: formdata,
                dataType: 'json',
                success: function (data) {
                    var  Address = data.Address;
                    var  Gender = data.Gender;
                    var  Phone = data.Phone;
                    var  about_me = data.about_me;
                    var success = '<div class="alert alert-success"><button class="close" data-close="alert"></button> <p>' + data.success + '</p></div>';
                    $('#Address').text(Address);
                    $('#Gender').text(Gender);
                    $('#Phone').text(Phone);
                    $('#about_me').text(about_me);
                    if (data){
                        $('#aboutsuccess').html(success);
                    }
                    // setTimeout(function(){$('#success')[0].reset();}, 3000);
                },
                error: function () {
                    alert("Error reaching the server. Check your connection");
                }
            });
        });
        $('.myportfolioimg').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formdata = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('myportfolio.delete') }}',
                data: formdata,
                dataType: 'json',
                success: function (data) {

                    var success = '<div class="alert alert-success"><button class="close" data-close="alert"></button> <p>' + data.success + '</p></div>';

                    if (data){
                        var dataid = Number(data.id);
                        var dataidsecand =  dataid + Number("1");

                        $('#portfoliosuccess').html(success);
                        $(".portfolioimg" + dataid).remove();

                        $(".portfolioimg" + dataidsecand ).css({ "left" : "0px","top" : "0px"});

                    }
                    setTimeout(() =>{$('#portfoliosuccess').html('');}, 3000);
                    },
                error: function () {
                    alert("Error reaching the server. Check your connection");
                }

            });
        });
        $('.myskills-modal').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formdata = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('ajaxskillscreate') }}',
                data: formdata,
                dataType: 'json',
                success: function (data) {

                    var success = '<div class="alert alert-success"><button class="close" data-close="alert"></button> <p>' + data.success + '</p></div>';
                    var dataskills = '  <div class="col l6 m6 s12 delete' + data.last_id + 'id">\n' +
                        '                                        <div class="single_experties">\n' +
                        '                                            <div class="skilled-tittle">' + data.name + '</div>\n' +
                        '                                            <div class="progress">\n' +
                        '                                                <div class="progress-bar jquery-bg wow Rx-width-' + data.level + '  animated" role="progressbar"\n' +
                        '                                                     data-wow-duration="1s" data-wow-delay=".15s" aria-valuenow="0"\n' +
                        '                                                     aria-valuemin="0" aria-valuemax="' + data.level + '">\n' +
                        '                                                    <span class="jquery-color">' + data.level + '%</span>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>';
                    var dataskillsmodal = ' <tr class="delete' + data.last_id + 'id">' +
                        '                                        <td>' + data.name + '</td>' +
                        '                                        <td>' + data.level + '</td>' +
                        '               <td> <a href="javascript:;" id="' + data.last_id + '" class="btn btn-default btn-sm delete-data" ><i class="fa fa-trash-o"></i></a>\n</td>' +
                        '                                    </tr>';
                    if (data){
                        // $('#portfoliosuccess').html(success);
                        $('.dataskillslist').append(dataskills);
                        $('.dataskillsmodaltable').after(dataskillsmodal);
                        $('.myskills-modal')[0].reset();
                    }
                    $('#myskillssuccess').html(success);
                    setTimeout(() =>{$('#myskillssuccess').html('');}, 3000);
                },
                error: function () {
                    alert("Error reaching the server. Check your connection");
                }

            });
        });
        $(document).on('click', '.delete-data', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to Delete this data?"))
            {
                $.ajax({
                    url:"{{route('ajaxskillsdelete')}}",
                    mehtod:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        console.log(data);
                        var success = '<div class="alert alert-success"><button class="close" data-close="alert"></button> <p>' + data.success + '</p></div>';

                        if (data){
                            var dataid = Number(data.id);
                            // var dataidsecand =  dataid + Number("1");
                            $(".delete" + dataid + "id").remove();
                            $('#myskillssuccess').html(success);
                            setTimeout(() =>{$('#myskillssuccess').html('');}, 3000);
                        }
                    }
                })
            }
            else
            {
                return false;
            }
        });
    });

</script>

{!! NoCaptcha::renderJs() !!}
@stack('js')
</body>
</html>
