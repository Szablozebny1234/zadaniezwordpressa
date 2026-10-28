wp.customize.bind( 'ready', function() {

	// Contextual: Spotlight Posts Source.
	wp.customize( ( 'set_top_posts[source]' ), function( value ) {
		var setupControl = function( source ) {

			return function( control ) {
				var setActiveState, isDisplayed;

				isDisplayed = function() {
					return ( source === value.get() );
				};

				setActiveState = function() {
					control.active.set( isDisplayed() );
				};

				control.active.validate = isDisplayed;
				setActiveState();
				value.bind( setActiveState );
			};

		};

		wp.customize.control( ( 'set_top_posts[categories]' ), setupControl( 'categories' ) );
		wp.customize.control( ( 'set_top_posts[tags]' ), setupControl( 'tags' ) );
	} );

} );
