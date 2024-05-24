function load() {
    let inout = document.getElementById('cpf');
    let inputValue = input.value.replace(/\d/g, "");
    let formattedValue = "";

    if (inputValue.length === 11) {
        formattedValue = inputValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (inputValue.length == 14) {
        formattedValue = inputValue.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-%5");
    } else {
        formattedValue = inputValue;
    }

    input.value = formattedValue;

}