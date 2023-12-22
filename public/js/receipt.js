let change = document.querySelector("#change span");
let cashAccepted = document.querySelector("#cashAccepted");
let total = document.querySelector("#total");
let addBtn = document.querySelector(".add");
let clearBtn = document.querySelector("#clear");

//shortcuts
document.addEventListener("keydown", (e) => {
    if (e.key == "F" && e.ctrlKey && e.shiftKey) {
        document.querySelector("#search input").focus();
    }

    if (e.key == "A" && e.ctrlKey && e.shiftKey) {
        addBtn.click();
    }
    if (e.key == "D" && e.ctrlKey && e.shiftKey) {
        deleteReceipt();
    }
    if (e.key == "C" && e.ctrlKey && e.shiftKey) {
        deleteReceipt();
    }
});

observeActiveReceipt();
activeBtnEvList();

clearBtn.addEventListener("click", clearReceipt);

function clearReceipt() {
    getActiveReceipt().innerHTML = "";
}

function observeActiveReceipt() {
    let receipt = getActiveReceipt();

    let observer = new MutationObserver((mutationList, observer) => {
        calculateTotalPrice();
        calculateChange();
        if (receipt.childElementCount > 0) {
            let lastElement = receipt.lastElementChild
            lastElement.addEventListener("dblclick", removeReceiptRow)
            lastElement.querySelector(".reduce").addEventListener("click", reduceAmountOfItem)

        }
    });

    observer.observe(receipt, { childList: true });
}

function reduceAmountOfItem(e) {
    let parentNode = e.currentTarget.parentNode
    let amountNode = parentNode.querySelector(".itemAmount b")
    let prevAmount = Number(amountNode.textContent)
    let reducedAmount = prevAmount - 1
    if (reducedAmount <= 0) {
        parentNode.remove();
    }
    amountNode.textContent = reducedAmount
    let rowTotalPriceNode = parentNode.querySelector(".itemPrice span");
    let rowTotalPrice = Number(rowTotalPriceNode.textContent)
    rowTotalPriceNode.textContent = recalculateRowPrice(rowTotalPrice, prevAmount, reducedAmount)   
    calculateTotalPrice();
    calculateChange();
}

function recalculateRowPrice(total, prevAmount, newAmount) {
    return total/prevAmount * newAmount
}

function removeReceiptRow(e) {
    e.currentTarget.remove();
}

function calculateTotalPrice() {
    let receiptPrices = [
        ...document.querySelectorAll(".receipt.active .itemPrice span"),
    ].map((node) => {
        return Number(node.innerText);
    });

    document.querySelector("#totalPrice").innerText =
        receiptPrices.length > 0
            ? receiptPrices.reduce((total, current) => {
                  return (total += current);
              })
            : 0;
}

document.querySelectorAll(".product.link").forEach((product) => {
    product.addEventListener("click", (e) => {
        e.preventDefault();
        addToReceipt(e.currentTarget.href);
    });
});

let observer = new MutationObserver(() => {
    if (change.innerText < 0) {
        if (change.classList.contains("text-success")) {
            change.classList.toggle("text-danger");
            change.classList.toggle("text-success");
        }
    } else {
        if (change.classList.contains("text-danger")) {
            change.classList.toggle("text-danger");
            change.classList.toggle("text-success");
        }
    }
});

observer.observe(change, { childList: true });

async function addToReceipt(link) {
    const response = await fetch(link);
    const product = await response.json();

    amountPrompt(product);

    // storeInLocalStorage(product);
}

function amountPrompt(product) {
    let amount = prompt("Množství", 1);
    let customPrice;
    if (product.id == 0 || product.id == 38) {
        customPrice = prompt("Zadejte cenu");
        if (customPrice == null) {
            return;
        }
    }

    if (amount != null) {
        getActiveReceipt().insertAdjacentHTML(
            "beforeend",
            `
            <div class="receiptItem p-1 d-flex justify-content-between">
                <span class="itemId"><b>${product.id}</b></span>
                <span class="itemName"><b>${product.name}</b></span>
                <span class="itemAmount"><b>${amount}</b>x</span>
                <button class="reduce">↓</button>
                <span class="itemPrice"><b><span>${
                    customPrice != null
                        ? customPrice * amount
                        : product.price * amount
                }</span>kč</b></span>
            </div>`
        );
    }
}

document.querySelector("#search").addEventListener("submit", (e) => {
    let product = document.querySelector(
        `a[data-productId='${e.target[0].value}']`
    );
    if (product != null) {
        product.click();
    }
    e.target[0].value = "";
    e.preventDefault();
});

cashAccepted.addEventListener("input", calculateChange);

function calculateChange(e) {
    let receiptValue = document.querySelector("#totalPrice").innerText;
    let cashGiven = cashAccepted.value;
    change.innerText = cashGiven - receiptValue;
}

addBtn.addEventListener("click", (e) => {
    // it's weird but just let it be - the numbers match
    let receiptsNumber = getAllReceiptBtns().length;

    e.currentTarget.classList.toggle("active");

    unhighlightReceiptBtn();
    e.currentTarget.insertAdjacentHTML(
        "beforebegin",
        `<button class="mb-1 active" id='${receiptsNumber}'>${receiptsNumber}</button>`
    );
    unhighlightReceipt();
    activeBtnEvList();
    total.insertAdjacentHTML(
        "beforebegin",
        `<div class="receipt active" id='${receiptsNumber}'></div>`
    );
    calculateTotalPrice();
    nullifyChange();
    observeActiveReceipt();
});

function activeBtnEvList() {
    getActiveReceiptBtn().addEventListener("click", (e) => {
        let currBtn = e.currentTarget;
        let id = currBtn.id;

        getActiveReceiptBtn().classList.toggle("active");
        e.currentTarget.classList.toggle("active");

        getActiveReceipt().classList.toggle("active");
        document
            .querySelector(`.receipt[id='${id}']`)
            .classList.toggle("active");

        calculateTotalPrice();
    });
}

document.querySelector("#delete").addEventListener("click", deleteReceipt);

function deleteReceipt() {
    if (getAllReceipts().length > 1) {
        let activeReceipt = getActiveReceipt();
        let activeReceiptBtn = getActiveReceiptBtn();

        let activeReceiptId = activeReceipt.id;

        let allReceiptBtns = getAllReceiptBtns();
        let allReceipts = getAllReceipts();

        for (
            let index = Number(activeReceiptId) + 1;
            index < allReceipts.length;
            index++
        ) {
            let receipt = allReceipts[index];
            let btn = allReceiptBtns[index];

            receipt.setAttribute("id", Number(receipt.id) - 1);
            btn.setAttribute("id", Number(btn.id) - 1);
            btn.innerText = Number(btn.innerText) - 1;
        }

        activeReceipt.remove();
        activeReceiptBtn.remove();
        getAllReceiptBtns()[0].classList.toggle("active");
        getAllReceipts()[0].classList.toggle("active");

        calculateTotalPrice();
    }
}

function nullifyChange() {
    change.innerText = "0";
    cashAccepted.value = "";
}

function unhighlightReceiptBtn() {
    document
        .querySelector("#receiptList button.active")
        .classList.toggle("active");
}
function unhighlightReceipt() {
    document.querySelector(".receipt.active").classList.toggle("active");
}

// getters
function getAllReceipts() {
    return document.querySelectorAll(".receipt");
}
function getAllReceiptBtns() {
    return document.querySelectorAll("#receiptList button:not(.add)");
}
function getActiveReceiptBtn() {
    return document.querySelector("#receiptList button.active");
}
function getActiveReceipt() {
    return document.querySelector(".receipt.active");
}
function getAllActiveReceiptItems() {
    return getActiveReceipt().children;
}



function storeInLocalStorage(product) {

    localStorage.setItem(getActiveReceipt().id,);
    
}

function receiptItemsToJson(){
    getAllActiveReceiptItems().map(el => {
        let receiptItemDetails = el.children;
        
    })
}