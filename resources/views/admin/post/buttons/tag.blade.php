
@if(app('l') == 'en')
  {{ App\Tag::find($tag_id)->name_en }}

@else
  {{ App\Tag::find($tag_id)->name_ar }}

@endif