let btn = document.querySelector('div.burger');
console.log(btn);

btn.addEventListener('click', test);

function test() 
{
    document.querySelector('div.ssilki').classList.toggle('active');
}


let num = document.getElementById("number");
let ed_per_click = 1;
console.log(num);

num.addEventListener('click', inc);

function inc()
{
    num.value = parseInt(num.value) + ed_per_click;
}

let up = document.getElementById("upgrade");
up.value = 10;
up.addEventListener('click', buy);
function buy()
{
    if (num.value >= parseInt(up.value))
    {
        num.value -= up.value;
        ed_per_click += 1;
        up.value = Math.round(parseInt(up.value) * 1.3);
    }
}
