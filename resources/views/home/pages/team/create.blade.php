
@extends('draftsman.layouts.app')
@section('content')
@push('css')
<style >
.input-file-container {
  position: relative;
  width: 225px;
} 
.js .input-file-trigger {
  display: block;
  padding: 14px 45px;
  background: #39D2B4;
  color: #fff;
  font-size: 1em;
  transition: all .4s;
  cursor: pointer;
}
.js .input-file {
  position: absolute;
  top: 0; left: 0;
  width: 225px;
  opacity: 0;
  padding: 14px 0;
  cursor: pointer;
}
.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #34495E;
  color: #39D2B4;
}

.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}
.js .file-return:not(:empty):before {
  content: "Selected file: ";
  font-style: normal;
  font-weight: normal;
}






/* Useless styles, just for demo styles */


h1, h2 {
  margin-bottom: 5px;
  font-weight: normal;
  text-align: center;
  color:#aaa;
}
h2 {
  margin: 5px 0 2em;
  color: #1ABC9C;
}

h2 + P {
  text-align: center;
}
.txtcenter {
  margin-top: 4em;
  font-size: .9em;
  text-align: center;
  color: #aaa;
}
.copy {
  margin-top: 2em;
}
.copy a {
  text-decoration: none;
  color: #1ABC9C;
}
</style>
@endpush
@push('js')
<script>
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>
@endpush

   <!-- ==================== contact-me-section start ==================== -->
        <div data-scroll='5' class="testomonials-section sec-p100-bg-bs mb-30 clearfix" id="testimonial">

            <div class="Section-title">
                <h2>
					<i class="fa fa-plus" aria-hidden="true"></i>
@awt('Add action','en')
                </h2>
                <span>@awt('Add action','ar')</span>
               {!!Form::open(['url'=>url('draftsman/add_action'),'method'=>'post','files'=>true,'class'=>'form-horizontal form-row-seperated'])!!}
                            <h2 class="title mb-30">@awt('Data plate','en')</h2>

                            <div class="input-field">
                                <input type="text" name="title" class="require">
                                <label>@awt('title','ar')</label>
                            </div>
                <div class="input-field">
                                <label>@awt('Pictures of paintings','ar')</label>
                </div>
                 <div class="input-file-container">  
                                {!! Form::file('file[]',['multiple'=>'yes','id'=>'my-file','class'=>'input-file','placeholder'=>trans('admin.image_product')]) !!}
    <label tabindex="0" for="my-file" class="input-file-trigger">@awt('Select the panels','en').</label>
  </div>
                            <div class="input-field">

                            </div>
                            <button type="button" class="btn btn-primery "> <i class="fa fa-plus" aria-hidden="true"></i>        &nbsp;{{trans('admin.add')}}</button>
{!!Form::close()!!}
            </div>
            <!-- /.Section-title -->

           

        </div>
        <!-- /.contact-me-section -->
        <!-- ==================== contact-me-section end ==================== -->

@stop