<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<button type="submit" class="search-form__submit">
		<img src="@asset('./images/search.svg')" alt="search button">
	</button>
	<input type="text" class="search-form__input" value="<?php echo get_search_query(); ?>" name="s" placeholder="Пошук..." />
</form>
