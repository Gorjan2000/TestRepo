


var c = document.getElementById("item-container").childElementCount;
let Increment = 1;
document.getElementById('add-new-item').onclick = function () {
    let template = `
        <div class="row">
        <div class="col-3">
        <input type="text" id="iName" class="iName form-control" name="iName[]" onkeyup="clickItem()"  placeholder="Item Name">
        </div>
        <div class="col-3">
        <input type="number" id="cost" class="cost form-control" name="cost[]" placeholder="Unit cost">
        </div>
        <div class="col-3">
        <input type="number" id="quantity" class=" form-control" name="qty[]" onkeyup="itemValue()" placeholder="Quantity">
        </div>
        <div class="col-3">
        <button type="button" id="bt" class="btn btn-danger" onclick="return this.parentNode.parentNode.remove(); ">Delete</button>
        </div>
        </div>
        <br/>
    `;


    let container = document.getElementById('item-container');
    let div = document.createElement('div');
    div.innerHTML = template;
    container.appendChild(div);
    Increment++;
}

function clickItem() {
    let tries = document.getElementById('myUL')
    tries.innerHTML = ''
    var ii = document.getElementsByClassName('iName')
    for (var i = 0; i < ii.length; i++) {
        let inp = ii[i].value
        fetch("http://127.0.0.1:8000/api/item").then(res => res.json()).then(data => {
            data.forEach(function (data) {
                let obj = Object.values(data)[3]
                let cost = Object.values(data)[4]
                if (obj.search(inp) > -1) {
                    tries.innerHTML += `<li><p class="itemlist" onclick="getItem(this)" data-item="${obj}" data-cost="${cost}">${obj}</p></li>`
                }
            })
        }).catch(err => console.log(err))
    }
    tries.innerHTML = ''
}


function getItem(t) {
    var c = document.getElementById("item-container").childElementCount;
    let tries = document.getElementById('myUL')
    tries.innerHTML = ''
    var iName = document.getElementsByClassName('iName')
    var unit_cost = document.getElementsByClassName('cost')
    iName[c - 1].value = $(t).data("item")
    unit_cost[c - 1].value = $(t).data("cost")
}

function itemValue() {
    console.log(document.getElementById('cost').value)
    console.log(document.getElementById('quantity').value)
    document.getElementById('myUL').innerHTML = ""
    let value = $('form').serialize()
    let ItemList = value.split("&")
    ItemList.shift()
    ItemList.splice(-6, 6)
    ItemList.shift()
    let AllItems = []
    ItemList.forEach(function (data) {
        AllItems.push(data.split("=")[1])
    })
    console.log(ItemList)
    if (AllItems.length % 3 !== 0) {
        AllItems.shift()
    }

    let totalamount = 0
    for (let index = 0; index < AllItems.length; index = index + 3) {
        totalamount += AllItems[index + 1] * AllItems[index + 2]
    }

    document.getElementById('cost_wod').value = totalamount


    // DISCOUNTED COST
    let discount = document.getElementById('discount')
    let tax = document.getElementById('tax')
    let discounted_price = (1 - (discount.value) / 100) * totalamount
    let tax_price = (1 + (tax.value) / 100) * discounted_price
    dcost.value = tax_price


    // DUE AMOUNT
    let due = document.getElementById('due')
    due.value = document.getElementById('dcost').value - document.getElementById('advance').value
}

function AdvanceValue() {
    let due = document.getElementById('due')
    due.value = document.getElementById('dcost').value - document.getElementById('advance').value
}


$("#cost_wod").on("click",
    function () {
        itemValue()
    }
)
