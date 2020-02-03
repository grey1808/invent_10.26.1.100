
var id = document.getElementById("technics-tech_group_id").value;
load(id)


const select = document.getElementById('technics-tech_group_id').addEventListener('change', function(){
    var value = this.value;
    load(value);
});

function load(value) {
    const url = '/admin/technics/comp?id=' + value


    const response = fetch(url)
        .then(function (response) {
            // console.log(response)
            return response.json()
            // console.log(response)
        })
        .then(function (data) {
            const ul = document.querySelector('#list')

            var html = data.map(function (item) {
                return '' +
                    '<div class="form-group">' +
                    '<label class="control-label">' + item.name + '</label>' +
                    '<input type="text" class="form-control" data-value="' + item.id + '" placeholder="' + item.comment + '" value="">' +
                    '</div>'
            })
            ul.innerHTML = "";
            const btn = '<button type="button" class="btn btn-success" id="params-success" onclick="foo()">Сохранить значения</button>'
            ul.insertAdjacentHTML('afterbegin',html.join(' ') + btn)

            if(document.getElementById("technics-params").value){
                getValue()
            }

        })

} // генерируем форму из состава характеристики, Создаем форму при старте

function getValue() {

    let datadb = document.getElementById("technics-params").value;

    console.log(datadb)
    value = datadb.split('?')
    var inputs = document.querySelectorAll('#list input');

    const list = value.find(function (item) {
        item = JSON.parse(item)
        for(let elem of inputs){
            if(item.id == elem.dataset.value){
                elem.value = item.value
            }

        }

    }) // Сподставляем значения
} // заполнить значения в созданной форме функции Load

function foo() {
    const input = document.querySelectorAll('#list input');
    var value = document.getElementById("technics-params")
    value.value = ''
    for (let inputs of input) {
        value.value += '{"id":' + inputs.getAttribute('data-value') + ',"value":"' + inputs.value + '"}?'
    }
    var value = document.getElementById("technics-params")
    value.value = value.value.slice(0,-1)
}
