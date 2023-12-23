document.addEventListener('DOMContentLoaded', function () {
    let deleteCalculations = document.querySelector('.delete-all-calculations');

    deleteCalculations?.addEventListener('click', function (e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete all data?')) {
            fetch('delete', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then((response) => {
                    return response.json();
                })
                .then(() => {
                    document.querySelector('tbody').innerHTML = '';
                })
                .catch((error) => {
                    console.error('Error deleting data:', error.message);
                });
        }
    });
});
