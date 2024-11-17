document.addEventListener('DOMContentLoaded', function() {
    const clearButton = document.getElementById('clear-dates');
    const startDateInput = document.querySelector('input[name="start_date"]');
    const endDateInput = document.querySelector('input[name="end_date"]');
    const filterForm = document.getElementById('filterForm');

    clearButton.addEventListener('click', function() {
        startDateInput.value = '';
        endDateInput.value = '';
        filterForm.submit();
    });
});
