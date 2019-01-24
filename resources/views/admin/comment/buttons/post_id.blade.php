@if(app('l')=='en')
 {{post_find($post_id)->title_en}}  
@else 
{{post_find($post_id)->title_ar}}

@endif
