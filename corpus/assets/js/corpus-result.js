(() => {
	'use strict';
	const url = new URL(window.location.href);
	const urlParams = new URLSearchParams(url.search);
	const tableContainer = document.querySelector('.table-container');

	if (urlParams.has('submitc')) {
		tableContainer.classList.add('characteristic');
	} else if (urlParams.has('submitw')) {
		tableContainer.classList.add('word');
	}
})();
