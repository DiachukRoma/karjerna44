@props([
    'post' => null,
])

<div class="slide">
		<p class="slide__photo" style="background-image: url('{!! $post->img !!}')"></p>
		<p class="slide__title">{!! $post->title !!}</p>
		<p class="slide__tag">{!! $post->tag !!}</p>
</div>
