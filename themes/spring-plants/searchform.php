<!-- Template for dynamically loading the search form onto the page -->
<form id="search-form" class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group mb-3">
		<input id="search-bar" name="s" type="text" class="form-control form-control-lg" value="<?php echo get_search_query(); ?>" placeholder="Search site..." aria-label="Recipient's username" aria-describedby="basic-addon2">
		<div class="input-group-append">
			<button class="btn form-control-lg" type="submit" style="color: white; background-color: #AEC733;">Search</button>
		</div>
	</div>
</form>