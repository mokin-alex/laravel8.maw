window.onload = function () {
    let buttons = document.querySelectorAll('#toggle');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            let txt = 'tested!';
            fetch('/admin/user/toggle/', {
                method: 'POST',
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    txt: txt,
                    text: "aaaaaaaaaaaaaaaa"
                },
            })
                .then(response => response.json())
                .then((data) => {
                    document.querySelector('#text').innerHTML = data.text;
                });
        })
    });
}
