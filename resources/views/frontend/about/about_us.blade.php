@extends('layouts.app')
@section('content')
<div  class="container impact-height">
    <div class="container-fluid">
        <div class="row col-md-12">
            <div class="col-md-7">
                <h1 class="title"><span property="schema:name" class="field field--name-title field--type-string field--label-hidden pr-5">{!! $about->short_description !!}</span></h1>
                <div class="pb-1">
                    <p>{!! $about->description !!}</p>
                </div>
            </div>
            <div class="col-md-5 col-5 mt-5">
                <img src="{{ asset($about->thumbs) }}" alt="No Image">
            </div>
    </div><br><br>
    </div>



<hr class="cbs-blood-bg">
    <div >
<div  class="col-md-6">
        <a id="19648" name="19648" class="hashlink"></a>
<div class="col h-100 paragraph paragraph--type-links paragraph--view-mode-default paragraph-id-19648">


<div>
    @foreach($faqs as $faq)
    <ul  class="jump">
        <li><a href="">{{ $faq->question }}</a></li>
    </ul>
    @endforeach
</div>



</div>



</div>

</div>



    <div class="row">
        @foreach($faqs as $faq)
            <div class="col-12 p-4 px-md-1 py-md-4">
                <div class="w-100">
                    <h3 class="font-weight-bold">{{ $faq->question }}</h3>
                    <hr class="cbs-blood-bg"><div >
                </div>
            <div class="w-100">
                 <p>{!! $faq->answer  !!}</p>
             </div>
         </div>
         @endforeach
    </div>

</div>



</div>


@endsection
