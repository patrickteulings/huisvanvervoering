/* global huisvanvervoeringIsDarkMode, setTimeout */

// Check the color scheme preference and inject the classes if necessary.
if ( document.body.classList.contains( 'huisvanvervoering-supports-dark-theme' ) ) {
	huisvanvervoeringDarkModeEditorInit();
}

/**
 * Once the editor loads, add the dark mode class.
 *
 * Wait for the editor to load by periodically checking for an element, then we add the classes.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @param {number} attempt Track the number of tries
 * @return {void}
 */
function huisvanvervoeringDarkModeEditorInit( attempt ) {
	var container = document.querySelector( '.block-editor__typewriter' ),
		maxAttempts = 8;

	// Set the initial attempt if it's undefined.
	attempt = attempt || 0;

	if ( huisvanvervoeringIsDarkMode() ) {
		if ( null === container ) {
			// Try again.
			if ( attempt < maxAttempts ) {
				setTimeout(
					function() {
						huisvanvervoeringDarkModeEditorInit( attempt + 1 );
					},
					// Double the delay, give the server some time to breathe.
					25 * Math.pow( 2, attempt )
				);
			}
			return;
		}

		document.body.classList.add( 'is-dark-theme' );
		document.documentElement.classList.add( 'is-dark-theme' );
		container.classList.add( 'is-dark-theme' );
	}
}
