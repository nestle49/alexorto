<form role="search" method="get" class="search-form" id="search-form" action="<?= esc_url( home_url( '/' ) ) ?>">
		<input type="search" class="search-field" placeholder="Поиск" value="<?= get_search_query() ?>" name="s" />
		<button type="submit" class="search-submit" id="search-submit">
            <svg id="search" viewBox="0 0 24 24">
		        <path d="M18.227 16.627l3.443 3.444c.44.44.441 1.15-.003 1.596a1.128 1.128 0 0 1-1.596.003l-3.444-3.443C15.2 19.317 13.435 20 11.5 20 6.815 20 3 16.185 3 11.5 3 6.815 6.815 3 11.5 3c4.685 0 8.5 3.815 8.5 8.5 0 1.935-.683 3.7-1.773 5.127zM11.5 18a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13z"></path>
	        </svg>
        </button>
        <button type="submit" class="search-close" id="search-close">
            <svg id="close-2" viewBox="0 0 24 24">
		        <path d="M12 10.586L5.638 4.224a.995.995 0 0 0-1.416-.002.999.999 0 0 0 .002 1.416L10.586 12l-6.362 6.362a.995.995 0 0 0-.002 1.416.999.999 0 0 0 1.416-.002L12 13.414l6.362 6.362a.995.995 0 0 0 1.416.002.999.999 0 0 0-.002-1.416L13.414 12l6.362-6.362a.995.995 0 0 0 .002-1.416.999.999 0 0 0-1.416.002L12 10.586z"></path>
	        </svg>
        </button>
</form>