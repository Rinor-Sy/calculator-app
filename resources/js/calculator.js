document.addEventListener('DOMContentLoaded', function () {
    let expression = document.querySelector('#input'),
        clearInput = document.querySelector('#clear'),
        backSpaceClear = document.querySelector('.back-space');

    expression?.addEventListener('input', function (e) {
        e.target.setAttribute('value', e.target.value);
    });

    document.querySelectorAll('.calc-btn').forEach((item) => {
        item?.addEventListener('click', (e) => {
            let updatedString = expression.value += e.target.innerHTML;
            expression.setAttribute('value', updatedString);
        })
    })

    document.querySelector('#result')?.addEventListener('click', (e) => {
        e.preventDefault();

        fetch('/calculate', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({expression: expression?.value})
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                if (data.errors || data.status === 'error') {
                    document.querySelector('.validation-msg').innerHTML = handleErrorMessages(data);
                }

                if (data?.status === 'success') {
                    let li = document.createElement('li');
                    li.className = 'text-white';
                    li.innerHTML = data.result;

                    document.querySelector('.user-results').append(li);
                    expression.value = data.result;
                    document.querySelector('.validation-msg').innerHTML = '';
                }
            })
            .catch(error => {
                console.error('Error executing expression:', error.message);
            });
    })

    clearInput?.addEventListener("click", function () {
        expression.value = "";
    })

    backSpaceClear?.addEventListener('click', () => {
        expression.value = expression.value.slice(0, -1);
    })
});

const handleErrorMessages = (data) => {
    let errorMsg;

    switch (true) {
        case Boolean(data.errors):
            errorMsg = data.message;
            break;
        case Boolean(data.status):
            errorMsg = data.message;
            break;
        default:
            errorMsg = "Invalid expression statement";
    }

    return errorMsg;
};
