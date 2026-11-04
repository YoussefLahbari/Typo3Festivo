document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('event_searchForm');
    const resultContainer = document.getElementById('ajaxCallResult');

    if (!form || !resultContainer) {
        return;
    }

    const tagButtons = Array.from(form.querySelectorAll('.tag-button'));
    const hiddenTagsInput = form.querySelector('#selected-tags');
    const searchInput = form.querySelector('.search-field__input');
    let debounceTimer = null;

    const syncButtonState = () => {
        const activeValue = hiddenTagsInput ? hiddenTagsInput.value : '';

        tagButtons.forEach((button) => {
            const isActive = button.dataset.value === activeValue;
            button.classList.toggle('active', isActive);
            button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });
    };

    const fetchResults = async () => {
        const response = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        });

        if (!response.ok) {
            throw new Error(`Festivo AJAX request failed with status ${response.status}`);
        }

        resultContainer.innerHTML = await response.text();
    };

    const submitFilters = () => {
        fetchResults().catch((error) => {
            console.error(error);
            resultContainer.innerHTML = 'Ajax request failed';
        });
    };

    tagButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const value = button.dataset.value || '';
            const isActive = button.classList.contains('active');

            if (hiddenTagsInput) {
                hiddenTagsInput.value = isActive ? '' : value;
            }

            syncButtonState();
            submitFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            window.clearTimeout(debounceTimer);
            debounceTimer = window.setTimeout(submitFilters, 250);
        });
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        window.clearTimeout(debounceTimer);
        submitFilters();
    });

    syncButtonState();
});
