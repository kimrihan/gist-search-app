(() => {
	'use strict';
	const corpusFormRadioEl = document.querySelector('.corpus-form-radio');
	const corpusTypeRadioEl = document.querySelector('.corpus-type-radio');
	const corpusWCLiterary = document.querySelectorAll('.corpus_literary');
	const corpusWCColloquialness = document.querySelector(
		'.corpus_colloquialness'
	);

	window.onpageshow = function (e) {
		if (e.persisted) {
			setCorpusSearchForm();
			setWordClassRadioBtn();
		} else {
			setCorpusSearchForm();
			setWordClassRadioBtn();
		}
	};

	function setCorpusSearchForm() {
		const checkedEl = document.querySelector(
			'input[name=corpusSearchForm]:checked'
		);
		const corpusTypeInputEls = document.querySelectorAll(
			'input[name=corpusSearchForm]'
		);

		corpusTypeInputEls.forEach((el) => {
			if (el.checked) {
				el.classList.add('on');
			} else {
				el.classList.remove('on');
			}
		});

		const corpusFormEls = document.querySelectorAll('.corpus-form');

		corpusFormEls.forEach((el) => {
			if (el.classList.contains(checkedEl.value)) {
				el.classList.add('show');
			} else {
				el.classList.remove('show');
			}
		});
	}

	function setWordClassRadioBtn() {
		const checkedEl = document.querySelector(
			'.corpus-type-radio input[name=ctype]:checked'
		);

		const checkedCorpusType = checkedEl.value;
		if (checkedCorpusType === 'corpus_literary') {
			corpusWCColloquialness.checked = false;
			corpusWCColloquialness.disabled = true;

			corpusWCLiterary.forEach((el) => {
				el.checked = false;
				el.disabled = false;
			});
		} else {
			corpusWCLiterary.forEach((el) => {
				el.checked = false;
				el.disabled = true;
			});
			corpusWCColloquialness.checked = true;
			corpusWCColloquialness.disabled = false;
		}
	}
	corpusFormRadioEl.addEventListener('change', setCorpusSearchForm);
	corpusTypeRadioEl.addEventListener('change', setWordClassRadioBtn);
})();
