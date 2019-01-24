
@if(app('l') == 'en')

{{product_row($id)->product_name_en}}
@else
{{product_row($id)->product_name_en}}
@endif