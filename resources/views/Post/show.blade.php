@section('content')
<section class="section">
    @foreach($post as $posts)
    {{ $posts->title }}
    {{ $posts->comments->comment }}
    @endforeach
</section>
@endsection

